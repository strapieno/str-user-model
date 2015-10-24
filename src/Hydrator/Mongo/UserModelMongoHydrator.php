<?php

namespace Strapieno\User\Model\Hydrator\Mongo;

use Matryoshka\Model\Wrapper\Mongo\Hydrator\Strategy\MongoDateStrategy;
use Strapieno\ModelUtils\Hydrator\Mongo\DateHistoryHydrator;

/**
 * Class UserModelMongoHydrator
 */
class UserModelMongoHydrator extends DateHistoryHydrator
{
    public function __construct($underscoreSeparatedKeys = true)
    {
        $this->addStrategy('date_created', new MongoDateStrategy());
        parent::__construct($underscoreSeparatedKeys);
    }

}