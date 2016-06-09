<?php
namespace Strapieno\User\Model\Entity\Reference;

use Strapieno\User\Model\UserModelService;
use Strapieno\Utils\Model\Object\AbstractObject;
use Strapieno\Utils\Model\Object\EntityReference\EntityReferenceInterface;
use Strapieno\Utils\Model\Object\EntityReference\EntityReferenceTrait;
use Strapieno\Utils\Model\Object\ObjectInterface;

/**
 * Class UserReference
 */
class UserReference extends AbstractObject implements ObjectInterface, EntityReferenceInterface
{
    use EntityReferenceTrait;

    /**
     * @return String
     */
    public function getServiceName()
    {
        return UserModelService::class;
    }
}