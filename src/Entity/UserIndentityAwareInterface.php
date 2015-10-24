<?php

namespace Strapieno\User\Model\Entity;

/**
 * Interface UserIndentityAwareInterface
 */
interface UserIndentityAwareInterface
{
    /**
     * @return mixed
     */
    public function getIdentity();
}