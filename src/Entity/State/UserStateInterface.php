<?php

namespace Strapieno\User\Model\Entity\State;

/**
 * Interface UserStateInterface
 */
interface UserStateInterface
{
    /**
     * @return UserStateInterface
     */
    public function registered();

    /**
     * @return UserStateInterface
     */
    public function validated();

    /**
     * @return UserStateInterface
     */
    public function blocked();
}