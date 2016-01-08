<?php

namespace Strapieno\User\Model\Entity\State;

use BadMethodCallException;
use Strapieno\User\Model\Entity\State\Exception;
use Strapieno\Utils\Model\Entity\StateInterface;

/**
 * Class AbstractUserState
 */
abstract class AbstractUserState implements UserStateInterface, StateInterface
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @return UserInterface
     */
    public function registered()
    {
        throw new Exception\IllegalStateTransitionException;
    }

    /**Illegal
     * @return UserInterface
     */
    public function validated()
    {
        throw new Exception\IllegalStateTransitionException;
    }

    /**
     * @return UserInterface
     */
    public function blocked()
    {
        throw new Exception\IllegalStateTransitionException;
    }

    /**
     * @return string
     */
    public function getName()
    {
        if (!$this->name) {
            throw new BadMethodCallException();
        }
        return $this->name;
    }
}