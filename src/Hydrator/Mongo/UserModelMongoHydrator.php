<?php

namespace Strapieno\User\Model\Hydrator\Mongo;

use Matryoshka\Model\Wrapper\Mongo\Hydrator\Strategy\MongoDateStrategy;
use Strapieno\User\Model\Entity\State\UserStateManager;
use Strapieno\User\Model\Entity\State\UserStateStrategy;
use Strapieno\Utils\Hydrator\Mongo\DateHistoryHydrator;
use Strapieno\Utils\Hydrator\Strategy\StateStrategy;
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
        $this->addStrategy(
            'birth_date',
            new MongoDateStrategy('Y-m-d')
        );

        $strategy = new StateStrategy();
        $strategy->setStateManager(new UserStateManager())
            ->setFirstStateName('registered');
        $this->addStrategy('state', $strategy);

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