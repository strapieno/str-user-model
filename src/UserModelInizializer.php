<?php

namespace Strapieno\User\Model;

use Strapieno\Utils\Inizilizer\AbstractModelServiceInizilizer;

class UserModelInizializer extends AbstractModelServiceInizilizer
{
    const SERVICE_NAME = UserModelService::class;
    const INSTANCE_CLASS = UserModelAwareInterface::class;
    const SETTER_METHOD = 'setUserModelService';
}