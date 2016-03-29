<?php
namespace Strapieno\User\Model;

use Zend\ModuleManager\Feature\HydratorProviderInterface;
use Zend\ModuleManager\Feature\InputFilterProviderInterface;
use Zend\ModuleManager\Feature\ValidatorProviderInterface;
use Zend\Stdlib\ArrayUtils;


/**
 * Class Module
 */
class Module implements HydratorProviderInterface, ValidatorProviderInterface
{
    /**
     * @return array
     */
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    /**
     * {@inheritdoc}
     */
    public function getHydratorConfig()
    {
        return include __DIR__ . '/config/hydrator.config.php';
    }

    /**
     * {@inheritdoc}
     */
    public function getValidatorConfig()
    {
        return include __DIR__ . '/config/validator.config.php';
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
