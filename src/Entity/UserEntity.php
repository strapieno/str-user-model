<?php

namespace Strapieno\User\Model\Entity;

use Matryoshka\Model\Object\ActiveRecord\AbstractActiveRecord;
use Strapieno\ModelUtils\Entity\DateHistoryAwareTrait;
use Zend\Stdlib\Hydrator\HydratorAwareTrait;

/**
 * Class UserEntity
 */
class UserEntity extends AbstractActiveRecord implements UserInterface
{
    use DateHistoryAwareTrait;
    use UserTrait;

    /**
     * @return mixed
     */
    public function getIdentity()
    {
        return $this->userName;
    }
}