<?php

namespace Strapieno\User\Model\Entity;

/**
 * Class UserIdAwareInterface
 */
trait UserIdAwareTrait
{
    /**
     * @var string
     */
    protected $userId;

    /**
     * @return string
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param string $userId
     * @return $this
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
        return $this;
    }
}