<?php

namespace Strapieno\User\Model\Entity;

use Strapieno\ModelUtils\Entity\DateHistoryAwareInterface;
use Strapieno\ModelUtils\Entity\EntityInterface;
use Zend\Stdlib\Hydrator\HydratorAwareInterface;

/**
 * Class UserInterface
 */
interface UserInterface extends
    EntityInterface,
    DateHistoryAwareInterface,
    HydratorAwareInterface
{
    /**
     * @return string
     */
    public function getUserName();

    /**
     * @param string $userName
     * @return $this
     */
    public function setUserName($userName);
}