<?php

namespace Strapieno\User\Model\Entity;

use EarlyNinja\Sdk\Model\Entity\AbstractEntity;
use Strapieno\ModelUtils\Entity\DateHistoryAwareTrait;

/**
 * Class UserEntity
 */
class UserEntity extends AbstractEntity implements UserInterface
{
    use DateHistoryAwareTrait;
    use UserTrait;
}