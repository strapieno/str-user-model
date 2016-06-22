<?php
namespace Strapieno\User\Model;

use Zend\Console\Adapter\AdapterInterface;
use Zend\ModuleManager\Feature\ConsoleUsageProviderInterface;
use Zend\ModuleManager\Feature\HydratorProviderInterface;
use Zend\ModuleManager\Feature\InputFilterProviderInterface;
use Zend\ModuleManager\Feature\ValidatorProviderInterface;
use Zend\Stdlib\ArrayUtils;


/**
 * Class Module
 */
class Module implements HydratorProviderInterface, ValidatorProviderInterface, ConsoleUsageProviderInterface
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

    public function getConsoleUsage(AdapterInterface $console)
    {
        return [
            // Describe available commands
            'add-user --username= --email= --role= [--verbose|-v]' => 'Add user entity',
            // Describe expected parameters
            [ '--username', 'Username of the user'],
            [ '--email', 'Email of the user'],
            [ '--verbose|-v', '(optional) turn on verbose mode']
        ];
    }
}
