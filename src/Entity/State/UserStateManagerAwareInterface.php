<?php

namespace Strapieno\User\Model\Entity\State;

use Strapieno\User\Model\Entity\State\Exception;
use Zend\ServiceManager\AbstractPluginManager;
use Zend\ServiceManager\Exception;

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