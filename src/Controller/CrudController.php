<?php
namespace Strapieno\User\Model\Controller;

use Matryoshka\Model\Object\ObjectManager;
use Strapieno\User\Model\Entity\UserEntity;
use Strapieno\User\Model\UserModelAwareInterface;
use Strapieno\User\Model\UserModelAwareTrait;
use Zend\Console\ColorInterface;
use Zend\Console\Console;
use Zend\Console\Prompt\Line;
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

        /** @var $request Request */
        $request = $this->getRequest();
        $verbose = $request->getParam('verbose') || $request->getParam('v');

        $inputFilter = $this->getInputFilter();
        $data['client_id'] = $request->getParam('clientId', null);
        $data['type'] = $request->getParam('type', null);

        $data['password'] = Line::prompt(
            'Password : ',
            true
        );

        $data['password_re'] = Line::prompt(
            'Repeat password : ',
            true
        );

        /** @var $user UserEntity */
        $user = $this->getServiceLocator()->get(ObjectManager::class)->get('User');
        $user->setModel($this->getUserModelService());

        $inputFilter->setData($data);

        if (!$inputFilter->isValid()) {

            $this->showMessages($inputFilter->getMessages());
            return 0;
        }
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

        $input = $inputFilter->get('username');
        $input->setRequired(true);
        $input->getValidatorChain()->attach(
            $vm->get('userusernamealreadyexist', ['token' => 'password'])
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