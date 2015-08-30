<?php

namespace Strapieno\User\Model\Entity;

/**
 * Trait UserTrait
 */
trait UserTrait
{
    /**
     * @var string
     */
    protected $userName;

    /**
     * @return string
     */
    public function getUserName()
    {
        return $this->userName;
    }

    /**
     * @param string $userName
     * @return $this
     */
    public function setUserName($userName)
    {
        $this->userName = $userName;
        return $this;
    }
}