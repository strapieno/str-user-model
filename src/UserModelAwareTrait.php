<?php

namespace Strapieno\User\Model;

/**
 * Trait UserModelAwareTrait
 */
trait UserModelAwareTrait
{
    /**
     * @var UserModelInterface|null
     */
    protected $userModelService;

    /**
     * @return mixed
     */
    public function getUserModelService()
    {
        return $this->userModelService;
    }

    /**
     * @param UserModelInterface $userModelService
     * @return $this
     */
    public function setUserModelService(UserModelInterface $userModelService)
    {
        $this->userModelService = $userModelService;
        return $this;
    }
}