<?php

namespace Strapieno\User\Model\Validator;

use Strapieno\User\Model\Criteria\Mongo\UserMongoCollectionCriteria;
use Strapieno\User\Model\UserModelAwareInterface;
use Strapieno\User\Model\UserModelAwareTrait;
use Zend\Validator\AbstractValidator;

/**
 * Class UserNameAlreadyExist
 */
class UserNameUnique extends AbstractValidator implements UserModelAwareInterface
{
    use UserModelAwareTrait;

    const USER_NAME_NOT_UNIQUE = 'userNameNotUnique';
    const USER_NAME_MORE_THAN_ONE = 'userNameMoreThanOne';

    /**
     * @var bool
     */
    protected $excludeValue = true;

    /**
     * @var array
     */
    protected $messageTemplates = [
        self::USER_NAME_NOT_UNIQUE => 'User name must be unique',
        self::USER_NAME_MORE_THAN_ONE => 'User name must be at most one'
    ];

    /**
     * {@inheritdoc}
     */
    public function isValid($value)
    {
        // TODO add assetion manager
        $criteria = (new UserMongoCollectionCriteria())->setUserName($value);
        /** @var ResultSetInterface $result */
        $result  = $this->getUserModelService()->find($criteria);
        if ($this->excludeValue && $result->count() > 0 ) {
            $this->error(self::USER_NAME_NOT_UNIQUE);
            return false;
        } else if (!$this->excludeValue && $result->count() > 1 ) {
            $this->error(self::USER_NAME_MORE_THAN_ONE);
            return false;
        }
        return true;
    }

    /**
     * @return boolean
     */
    public function isExcludeValue()
    {
        return $this->excludeValue;
    }

    /**
     * @param boolean $excludeValue
     * @return $this
     */
    public function setExcludeValue($excludeValue)
    {
        $this->excludeValue = $excludeValue;
        return $this;
    }
}
