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
    const EMAIL_MORE_THAN_ONE = 'emailMoreThanOne';

    /**
     * @var bool
     */
    protected $excludeValue = false;

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
        // TODO add assetion manager
        $criteria = (new UserMongoCollectionCriteria())->setEmail($value);
        /** @var ResultSetInterface $result */
        $result  = $this->getUserModelService()->find($criteria);
        if ($this->excludeValue && $result->count() > 0) {
            $this->error(self::EMAIL_ALREDY_EXYST);
            return false;
        } else if (!$this->excludeValue && $result->count() > 1 ) {
            $this->error(self::EMAIL_MORE_THAN_ONE);
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
