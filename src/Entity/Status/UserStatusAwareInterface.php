<?php

namespace Strapieno\User\Model\Entity\Status;

/**
 * Interface UserStatusAwareInterface
 */
interface UserStatusAwareInterface
{
    /**
     * @return UserInterface
     */
    public function getStatus();

    /**
     * @param UserInterface $status
     * @return $this
     */
    public function setStatus(UserInterface $status);
}