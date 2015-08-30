<?php
/**
 * Strapieno user model
 *
 * @link        https://github.com/strapieno/str-user-model
 * @copyright   Copyright (c) 2014-2015, Strapieno <ripaclub@gmail.com>
 * @license     http://opensource.org/licenses/BSD-2-Clause Simplified BSD License
 */

use Zend\ServiceManager\ServiceManager;
use Zend\Mvc\Service\ServiceManagerConfig;

chdir(__DIR__);
if (!file_exists('../vendor/autoload.php')) {
    throw new \RuntimeException('vendor/autoload.php not found. Run a composer install.');
}
