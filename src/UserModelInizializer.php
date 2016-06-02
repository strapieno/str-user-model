<?php
namespace Strapieno\User\Model;

use Strapieno\Utils\Initializer\AbstractModelServiceInitializer;

class UserModelInitializer extends AbstractModelServiceInitializer
{
    const SERVICE_NAME = UserModelService::class;
    const INSTANCE_CLASS = UserModelAwareInterface::class;
    const SETTER_METHOD = 'setUserModelService';
}