<?php

namespace Strapieno\User\Model;

/**
 * Trait UserModelAwareInterface
 */
interface UserModelAwareInterface
{
    /**
     * @return UserModelInterface|null
     */
    public function getUserModelService();

    /**
     * @param UserModelInterface $userModelService
     * @return $this
     */
    public function setUserModelService(UserModelInterface $userModelService);
}