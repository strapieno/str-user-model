<?php

namespace Strapieno\User\Model\Validator;

use Strapieno\User\Model\Criteria\Mongo\UserMongoCollectionCriteria;
use Strapieno\User\Model\UserModelAwareInterface;
use Strapieno\User\Model\UserModelAwareTrait;
use Zend\Validator\AbstractValidator;

/**
 * Class UserNameAlreadyExist
 */
class EmailUnique extends AbstractValidator implements UserModelAwareInterface
{
    use UserModelAwareTrait;

    const EMAIL_ALREDY_EXYST = 'emailAlreadyExist';

    /**
     * @var array
     */
    protected $messageTemplates = [
        self::EMAIL_ALREDY_EXYST => 'Email must be unique'
    ];

    /**
     * {@inheritdoc}
     */
    public function isValid($value)
    {
        $criteria = (new UserMongoCollectionCriteria())->setEmail($value);
        /** @var ResultSetInterface $result */
        $result  = $this->getUserModelService()->find($criteria);
        if ($result->count() > 0) {
            $this->error(self::EMAIL_ALREDY_EXYST);
            return false;
        }
        return true;
    }
}
