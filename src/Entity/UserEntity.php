<?php

namespace Strapieno\User\Model\Entity;

use Matryoshka\Model\Object\ActiveRecord\AbstractActiveRecord;
use Strapieno\ModelUtils\Entity\DateHistoryAwareTrait;
use Strapieno\ModelUtils\Entity\PasswordAwareTrait;
use Strapieno\ModelUtils\Entity\RercoverPasswordAwareTrait;
use Strapieno\ModelUtils\Entity\RoleAwareTrait;
use Zend\Stdlib\Hydrator\HydratorAwareTrait;

/**
 * Class UserEntity
 */
class UserEntity extends AbstractActiveRecord implements UserInterface
{
    use DateHistoryAwareTrait;
    use UserTrait;
    use RoleAwareTrait;
    use PasswordAwareTrait;
    use RercoverPasswordAwareTrait;

    /**
     * @return mixed
     */
    public function getIdentity()
    {
        return $this->userName;
    }
}