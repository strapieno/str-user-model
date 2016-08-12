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

    /**
     * @var array
     */
    protected $messageTemplates = [
        self::USER_NAME_NOT_UNIQUE => 'User name must be unique'
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
        if ($result->count() > 0) {
            $this->error(self::USER_NAME_NOT_UNIQUE);
            return false;
        }
        return true;
    }
}
