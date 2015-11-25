<?php

namespace Strapieno\User\Model\Entity\State;

/**
 * Class Registered
 */
class Registered extends AbstractUserState implements UserStateInterface
{
    /**
     * @var string
     */
    protected $name = 'registered';

    /**
     * @return Validated
     */
    public function validated()
    {
        return new Validated();
    }

    /**
     * @return Blocked
     */
    public function blocked()
    {
        return new Blocked();
    }
}