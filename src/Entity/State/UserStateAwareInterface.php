<?php

namespace Strapieno\User\Model\Entity\State;

/**
 * Interface UserStatusAwareInterface
 */
interface UserStateAwareInterface extends UserStateInterface
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