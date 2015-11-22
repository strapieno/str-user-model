<?php

namespace Strapieno\User\Model\InputFilter;

use Zend\InputFilter\Input;

/**
 * Class CreateInputFilter
 */
class CreateInputFilter extends DefaultInputFilter
{
{
    public function init()
    {
        parent::init();

        $this->updatePasswordInput()
            ->updateEmailInput()
            ->updateUserNameInput()
        ;
    }

    /**
     * @return $this
     */
    protected function updatePasswordInput()
    {
        if (!$this->has('password'))  {
            // TODO exception
        }

        $input = $this->get('password');
        $input->setRequired(true);

        return $this;
    }

    /**
     * @return $this
     */
    protected function updateEmailInput()
    {
        if (!$this->has('email'))  {
             // TODO exception
        }
        
        $input = $this->get('email');
        
        $validatorManager = $this->getFactory()->getDefaultValidatorChain()->getPluginManager();
        $input->getValidatorChain()->attach($validatorManager->get('user-emailalreadyexist'));

        return $this;
    }

    /**
     * @return $this
     */
    protected function updateUserNameInput()
    {
        if (!$this->has('user_name'))  {
            // TODO exception
        }

        $input = $this->get('user_name');
        // Validator
        $validatorManager = $this->getFactory()->getDefaultValidatorChain()->getPluginManager();
        $input->getValidatorChain()->attach($validatorManager->get('user-usernamealreadyexist'));

        return $this;
    }
}