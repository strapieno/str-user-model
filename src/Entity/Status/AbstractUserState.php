<?php

namespace Strapieno\User\Model\Entity\Status;

use Strapieno\User\Model\Entity\Status\Exception;
use BadMethodCallException;

/**
 * Class AbstractUserState
 */
abstract class AbstractUserState implements UserInterface
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
        if (!$this->getName()) {
            throw new BadMethodCallException();
        }
        return $this->name;
    }

    /**
     * @param $name
     * @return mixed
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }
}