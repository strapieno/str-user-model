<?php

namespace Strapieno\User\Model\Hydrator\Mongo;

use Matryoshka\Model\Wrapper\Mongo\Hydrator\Strategy\MongoDateStrategy;
use Strapieno\ModelUtils\Hydrator\Mongo\DateHistoryHydrator;
use Strapieno\User\Model\Entity\State\UserStateManager;
use Strapieno\User\Model\Entity\State\UserStateStrategy;
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
        $this->addStrategy('birth_date', new MongoDateStrategy());
        $strategy = new UserStateStrategy();
        $strategy->setUserStateManager(new UserStateManager())
            ->setFirstStateName('registered');
        $this->addStrategy('status', $strategy);
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