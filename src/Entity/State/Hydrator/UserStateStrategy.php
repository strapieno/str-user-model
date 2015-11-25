<?php

namespace Strapieno\User\Model\Entity\State;

use Strapieno\ModelUtils\Hydrator\Strategy\StateStrategy;

/**
 * Class StateStrategy
 */
class UserStateStrategy extends StateStrategy implements UserStateManagerAwareInterface
{
    /**
     * @return UserStateManager|null
     */
    public function getUserStateManager()
    {
        return $this->plugins;
    }

    /**
     * @param UserStateManager $userStateManager
     * @return $this
     */
    public function setUserStateManager(UserStateManager $userStateManager)
    {
        $this->plugins = $userStateManager;
        return $this;
    }
}