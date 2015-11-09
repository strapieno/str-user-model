<?php

namespace Strapieno\User\Model\Hydrator\Mongo;

use Matryoshka\Model\Wrapper\Mongo\Hydrator\Strategy\MongoDateStrategy;
use Strapieno\ModelUtils\Hydrator\Mongo\DateHistoryHydrator;
use Zend\Stdlib\Hydrator\Filter\FilterComposite;
use Zend\Stdlib\Hydrator\Filter\MethodMatchFilter;

/**
 * Class UserModelMongoHydrator
 */
class UserModelMongoHydrator extends DateHistoryHydrator
{
    public function __construct($underscoreSeparatedKeys = true)
    {
        parent::__construct($underscoreSeparatedKeys);
        // Strategy
        $this->addStrategy('date_created', new MongoDateStrategy());
        // Filters
        $this->filterComposite->addFilter(
            'identity',
            new MethodMatchFilter('getIdentity', true),
            FilterComposite::CONDITION_AND
        );
        $this->filterComposite->addFilter(
            'password',
            new MethodMatchFilter('getPassword', true),
            FilterComposite::CONDITION_AND
        );
    }
}