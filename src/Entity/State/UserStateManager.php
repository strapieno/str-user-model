<?php

namespace Strapieno\User\Model\Entity\State;

use Strapieno\User\Model\Entity\State\Exception;
use Zend\ServiceManager\AbstractPluginManager;
use Zend\ServiceManager\Exception;

/**
 * Class UserStateManager
 */
class UserStateManager extends AbstractPluginManager
{
    protected $invokableClasses = [
        'registered' => 'Strapieno\User\Model\Entity\State\Registered',
        'blocked' => 'Strapieno\User\Model\Entity\State\Blocked',
        'validate' => 'Strapieno\User\Model\Entity\State\Validated'
    ];

    /**
     * Validate the plugin
     *
     * Checks that the filter loaded is either a valid callback or an instance
     * of FilterInterface.
     *
     * @param  mixed $plugin
     * @return void
     * @throws Exception\RuntimeException if invalid
     */
    public function validatePlugin($plugin)
    {
        if (!$plugin instanceof UserStateInterface) {
            throw new Exception\InvalidPluginException(sprintf(
                'State object %s is invalid; must implement "%s"',
                (is_object($plugin) ? get_class($plugin) : gettype($plugin)),
                UserStateInterface::class
            ));
        }
    }

}