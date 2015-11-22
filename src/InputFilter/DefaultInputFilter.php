<?php

namespace Strapieno\User\Model\InputFilter;

use Zend\InputFilter\Input;
use Zend\InputFilter\InputFilter;

/**
 * Class DefaultInputFilter
 */
class DefaultInputFilter extends InputFilter
{
    public function init()
    {
        $this->addUserNameInput()
            ->addEmailInput()
            ->addFirstNameInput()
            ->addLastNameInput()
            ->addBirthDate()
            ->addPasswordInput()
        ;
    }

    /**
     * @return $this
     */
    protected function addUserNameInput()
    {
        $input = new Input('user_name');
        // Filter
        $filterManager = $this->getFactory()->getDefaultFilterChain()->getPluginManager();
        $input->getFilterChain()->attach($filterManager->get('stringtrim'));

        $this->add($input);
        return $this;
    }

    /**
     * @return $this
     */
    protected function addEmailInput()
    {
        $input = new Input('email');
        // Filter
        $filterManager = $this->getFactory()->getDefaultFilterChain()->getPluginManager();
        $input->getFilterChain()->attach($filterManager->get('stringtrim'));
        // Validator
        $validatorManager = $this->getFactory()->getDefaultValidatorChain()->getPluginManager();
        $input->getValidatorChain()->attach($validatorManager->get('emailaddress'));

        $this->add($input);
        return $this;
    }

    /**
     * @return $this
     */
    protected function addFirstNameInput()
    {
        $input = new Input('first_name');
        $input->setRequired(false);
        // Filter
        $filterManager = $this->getFactory()->getDefaultFilterChain()->getPluginManager();
        $input->getFilterChain()->attach($filterManager->get('stringtrim'));

        $this->add($input);
        return $this;
    }

    /**
     * @return $this
     */
    protected function addLastNameInput()
    {
        $input = new Input('last_name');
        $input->setRequired(false);
        // Filter
        $filterManager = $this->getFactory()->getDefaultFilterChain()->getPluginManager();
        $input->getFilterChain()->attach($filterManager->get('stringtrim'));

        $this->add($input);
        return $this;
    }

    /**
     * @return $this
     */
    protected function addBirthDate()
    {
        $input = new Input('birth_date');
        $input->setRequired(false);
        // Filter
        $filterManager = $this->getFactory()->getDefaultFilterChain()->getPluginManager();
        $input->getFilterChain()->attach($filterManager->get('stringtrim'));
        // Validator
        $validatorManager = $this->getFactory()->getDefaultValidatorChain()->getPluginManager();
        $input->getValidatorChain()->attach($validatorManager->get('date'));

        $this->add($input);
        return $this;
    }

    /**
     * @return $this
     */
    protected function addPasswordInput()
    {
        $input = new Input('password');
        $input->setRequired(false);
        // Filter
        $filterManager = $this->getFactory()->getDefaultFilterChain()->getPluginManager();
        $input->getFilterChain()->attach($filterManager->get('stringtrim'));
        // Validator
        $this->add($input);
        return $this;
    }
}