<?php

namespace Strapieno\User\Model\Validator;

use Strapieno\User\Model\Criteria\Mongo\UserMongoCollectionCriteria;
use Strapieno\User\Model\UserModelAwareInterface;
use Strapieno\User\Model\UserModelAwareTrait;
use Zend\Validator\AbstractValidator;

/**
 * Class EmailExist
 */
class EmailExist extends AbstractValidator implements UserModelAwareInterface
{
    use UserModelAwareTrait;

    const EMAIL_NOT_EXYST = 'emailNotExist';

    /**
     * @var array
     */
    protected $messageTemplates = [
        self::EMAIL_NOT_EXYST => 'Email not exist'
    ];

    /**
     * {@inheritdoc}
     */
    public function isValid($value)
    {
        $criteria = (new UserMongoCollectionCriteria())->setEmail($value);
        /** @var ResultSetInterface $result */
        $result  = $this->getUserModelService()->find($criteria);
        if ($result->count() == 0) {
            $this->error(self::EMAIL_NOT_EXYST);
            return false;
        }
        return true;
    }
}
