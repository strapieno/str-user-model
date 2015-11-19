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
        $this->addPasswordInput();
    }

    /**
     * @return $this
     */
    protected function addPasswordInput()
    {
        $input = new Input('password');
        $input->setRequired(true);
        // Filter
        $filterManager = $this->getFactory()->getDefaultFilterChain()->getPluginManager();
        $input->getFilterChain()->attach($filterManager->get('stringtrim'));
        // Validator
        $this->add($input);
        return $this;
    }
}