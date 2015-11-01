<?php

namespace Strapieno\User\Model;

use Matryoshka\Model\ObservableModel;
use Strapieno\User\Model\Criteria\Mongo\UserMongoCollectionCriteria;
use Zend\Filter\Word\UnderscoreToCamelCase;

/**
 * Class UserModelService
 */
class UserModelService extends ObservableModel implements UserModelInterface
{
    /**
     * @param string $nameField
     * @param string $valueFiled
     * @return \Matryoshka\Model\ResultSet\ResultSetInterface|mixed|null
     */
    public function getAuthenticationUser($nameField, $valueFiled)
    {
        // TODO Manager criteria
        $criteria = new UserMongoCollectionCriteria();
        $setMethod = 'set' . (new UnderscoreToCamelCase())->filter($nameField);
        if (!method_exists($criteria, $setMethod) {
            // TODO Review
            throw new \RuntimeException('Method not found');
        }

        $criteria->$setMethod($valueFiled)
        return $this->find($criteria);
    }
}