<?php

namespace Strapieno\User\Model\Entity;

/**
 * Interface UserIdAwareInterface
 */
interface UserIdAwareInterface
{
    /**
     * @return string
     */
    public function getUserId();

    /**
     * @param $userId
     * @return string
     */
    public function setUserId($userId);
}