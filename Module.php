<?php
namespace Strapieno\User\Model;

use Zend\ModuleManager\Feature\InputFilterProviderInterface;
use Zend\Stdlib\ArrayUtils;
use Zend\Mvc\MvcEvent;
use ZF\Apigility\Provider\ApigilityProviderInterface;

/**
 * Class Module
 */
class Module
{
    /**
     * @return array
     */
    public function getConfig()
    {
        return __DIR__ . '/config/module.config.php';
    }

    /**
     * @return array
     */
    public function getAutoloaderConfig()
    {
        return [
            'Zend\Loader\StandardAutoloader' => [
                'namespaces' => [
                    __NAMESPACE__ => __DIR__ . '/src/',
                ],
            ],
        ];
    }
}
