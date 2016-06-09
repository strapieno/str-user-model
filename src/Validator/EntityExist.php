<?php
namespace Strapieno\User\Model\Validator;

use Strapieno\User\Model\UserModelAwareInterface;
use Strapieno\User\Model\UserModelAwareTrait;
use Strapieno\Utils\Validator\Model\AbstractEntityExist;
use Zend\Validator\ValidatorInterface;

/**
 * Class EntityExist
 */
class EntityExist extends AbstractEntityExist implements ValidatorInterface, UserModelAwareInterface
{
    use UserModelAwareTrait;

    const GETTER_METHOD_NAME = 'getUserModelService';

    /**
     * @var array
     */
    protected $messageTemplates = [
        self::ID_NOT_EXISTS => 'The id does not exist',
        self::NOT_MONGO_ID  => 'Identifier format not valid'
    ];

    protected function getModelMethodService()
    {
        return EntityExist::GETTER_METHOD_NAME;
    }
}