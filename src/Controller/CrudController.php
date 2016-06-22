<?php
namespace Strapieno\User\Model\Controller;

use Matryoshka\Model\Object\ObjectManager;
use Strapieno\User\Model\Entity\UserEntity;
use Strapieno\User\Model\UserModelAwareInterface;
use Strapieno\User\Model\UserModelAwareTrait;
use Zend\Console\ColorInterface;
use Zend\Console\Console;
use Zend\Console\Prompt\Line;
use Zend\Console\Prompt\Select;
use Zend\Console\Request;
use Zend\InputFilter\Input;
use Zend\InputFilter\InputFilter;
use Zend\Mvc\Controller\AbstractActionController;

/**
 * Class CrudController
 */
class CrudController extends AbstractActionController implements UserModelAwareInterface
{
    use UserModelAwareTrait;

    public function addAction()
    {
        $this->checkConsoleRequest();
        $config = $this->getServiceLocator()->get('Config');

        /** @var $request Request */
        $request = $this->getRequest();
        $verbose = $request->getParam('verbose') || $request->getParam('v');

        $inputFilter = $this->getInputFilter();
        $data['user_name'] = $request->getParam('username', null);
        $data['email'] = $request->getParam('email', null);
        $data['role'] = $request->getParam('role', null);

        if (!isset($config['UserRoleTypes']) || !is_array($config['UserRoleTypes']) || empty($config['UserRoleTypes'])) {

            Console::getInstance()->writeLine(
                'UserRoleTypes not config',
                ColorInterface::RED
            );
            return 0;
        }

        $roles = $config['UserRoleTypes'];
        $data['role_id'] = $roles[Select::prompt(
            'Select role',
            $roles,
            false,
            true
        )];

        $data['password'] = Line::prompt(
            'Password : ',
            true
        );

        $data['password_re'] = Line::prompt(
            'Repeat password : ',
            true
        );

        $inputFilter->setData($data);

        if (!$inputFilter->isValid()) {

            $this->showMessages($inputFilter->getMessages());
            return 0;
        }

        /** @var $entity UserEntity */
        $entity = $this->getServiceLocator()->get(ObjectManager::class)->get('User');
        $entity->setModel($this->getUserModelService());
        $this->getUserModelService()->getHydrator()->hydrate($inputFilter->getValues(), $entity);
        $entity->save();

        if ($verbose) {
            Console::getInstance()->writeLine(
                'User saved',
                ColorInterface::GREEN
            );
        }
        return 1;
    }

    public function checkConsoleRequest()
    {
        $request = $this->getRequest();
        if (!$request instanceof Request) {
            throw new \RuntimeException('The request must be a console request');
        }
    }

    /**
     * @return InputFilter
     */
    protected function getInputFilter()
    {
        /** @var $inputFilter InputFilter */
        $inputFilter = $this->getServiceLocator()
            ->get('InputFilterManager')
            ->get('Strapieno\User\Model\InputFilter\DefaultInputFilter');

        $vm = $this->getServiceLocator()
            ->get('ValidatorManager');

        $input = $inputFilter->get('user_name');
        $input->setRequired(true);
        $input->getValidatorChain()->attach(
            $vm->get('userusernamealreadyexist')
        );

        $input = $inputFilter->get('email');
        $input->setRequired(true);
        $input->getValidatorChain()->attach(
            $vm->get('useremailalreadyexist')
        );

        $input = new Input('password_re');
        $input->setRequired(false);
        $input->getValidatorChain()->attach(
            $vm->get('identical', ['token' => 'password'])
        );

        return $inputFilter->add($input);
    }

    /**
     * @param $messages
     * @param null $errorKey
     */
    protected function showMessages($messages, $errorKey = null)
    {
        foreach ($messages as $key => $message) {

            if (is_array($message)) {
                $this->showMessages($message, $key);
            } else {
                Console::getInstance()->writeLine(
                    sprintf('%s : %s', $errorKey, $message),
                    ColorInterface::RED
                );
            }
        }
    }
}