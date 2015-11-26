<?php

namespace Strapieno\User\Model\Entity\State;

/**
 * Interface UserStatusAwareInterface
 */
interface UserStateAwareInterface
{
    /**
     * @return UserInterface
     */
    public function getState();

    /**
     * @param UserInterface $state
     * @return $this
     */
    public function setState(UserStateInterface $state);
}