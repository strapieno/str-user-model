<?php

namespace Strapieno\User\Model\Entity;

use Matryoshka\Model\Object\ActiveRecord\AbstractActiveRecord;
use Strapieno\User\Model\Entity\State\UserStateAwareTrait;
use Strapieno\User\Model\Entity\Status\UserStatusAwareTrait;
use Strapieno\Utils\Model\Entity\DateHistoryAwareTrait;
use Strapieno\Utils\Model\Entity\IdentityExistAwareTrait;
use Strapieno\Utils\Model\Entity\PasswordAwareTrait;
use Strapieno\Utils\Model\Entity\RercoverPasswordAwareTrait;
use Strapieno\Utils\Model\Entity\RoleAwareTrait;

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
    use UserStateAwareTrait;
    use IdentityExistAwareTrait;

    /**
     * @return mixed
     */
    public function getIdentity()
    {
        return $this->userName;
    }
}