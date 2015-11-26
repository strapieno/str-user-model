<?php

namespace Strapieno\User\Model\Entity\State;

/**
 * Interface UserStateManagerAwareInterface
 */
interface UserStateManagerAwareInterface
{
    /**
     * @return UserStateManager|null
     */
    public function getUserStateManager();

    /**
     * @param UserStateManager $userStateManager
     * @return $this
     */
    public function setUserStateManager(UserStateManager $userStateManager);
}