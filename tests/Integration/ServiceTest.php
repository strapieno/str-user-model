<?php
namespace Strapieno\User\ModelTest\Integration;

use PHPUnit_Framework_TestCase;
use Strapieno\User\Model\Criteria\Mongo\UserMongoCollectionCriteria;
use Strapieno\User\Model\Entity\UserInterface;
use Strapieno\User\Model\Hydrator\Mongo\UserModelMongoHydrator;
use Strapieno\User\Model\UserModelService;
use Zend\Mvc\Service\ServiceManagerConfig;
use Zend\ServiceManager\ServiceManager;
use Zend\Stdlib\ArrayUtils;
use Zend\Stdlib\Hydrator\HydratorPluginManager;

/**
 * Class ServiceTest
 */
class ServiceTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var \Zend\ServiceManager\ServiceManager
     */
    protected $serviceManager;

    protected $config = [
        'abstract_factories' => [
            'Matryoshka\Model\Wrapper\Mongo\Service\MongoCollectionAbstractServiceFactory',
            'Matryoshka\Model\Wrapper\Mongo\Service\MongoDbAbstractServiceFactory',
        ],
        'factories' => [
            'Matryoshka\Model\ModelManager' => 'Matryoshka\Model\Service\ModelManagerFactory',
            'Matryoshka\Model\Object\ObjectManager' => 'Matryoshka\Model\Object\Service\ObjectManagerFactory',
            'Matryoshka\Model\Listener\ListenerManager'
            => 'Matryoshka\Model\Listener\Service\ListenerManagerFactory',
            'Matryoshka\Model\Object\PrototypeStrategy\ServiceLocatorStrategy'
            => 'Matryoshka\Model\Object\PrototypeStrategy\Service\ServiceLocatorStrategyFactory',
        ],
        'invokables' => [
            'Matryoshka\Model\ResultSet\ArrayObjectResultSet' => 'Matryoshka\Model\ResultSet\ArrayObjectResultSet',
            'Matryoshka\Model\ResultSet\HydratingResultSet' => 'Matryoshka\Model\ResultSet\HydratingResultSet',
        ],
        'shared' => [
            'Matryoshka\Model\ModelManager' => true,
            'Matryoshka\Model\Object\ObjectManager' => true,
            'Matryoshka\Model\Listener\ListenerManager' => true,
            'Matryoshka\Model\ResultSet\ArrayObjectResultSet' => false,
            'Matryoshka\Model\ResultSet\HydratingResultSet' => false,
        ],
    ];

    /**
     * Set up
     */
    public function setUp()
    {
        $config = require __DIR__ . '/../../config/module.config.php';
        $config['mongodb']['Mongo\Db']['hosts'] = 'mongo:27017';

        $configSm = ArrayUtils::merge($this->config, $config['service_manager']);
        $sm = $this->serviceManager = new ServiceManager(
            new ServiceManagerConfig($configSm)
        );
        $sm->setService('Config', $config);

        $hydratorManager = new HydratorPluginManager();
        $hydratorManager->setService(
            'Strapieno\User\Model\Hydrator\Mongo\UserModelMongoHydrator',
            new UserModelMongoHydrator()
        );
        $sm->setService('HydratorManager', $hydratorManager);

    }

    public function testHasMongoDbService()
    {
        $this->assertTrue($this->serviceManager->has('Mongo\Db'));
        $this->assertInstanceOf('MongoDb', $this->serviceManager->get('Mongo\Db'));
    }

    /**
     * @depends testHasMongoDbService
     */
    public function testHasMongoCollectionService()
    {
        $this->assertTrue($this->serviceManager->has('DataGateway\Mongo\User'));
        $this->assertInstanceOf('MongoCollection', $this->serviceManager->get('DataGateway\Mongo\User'));
    }

    public function testHasUserEntityFromObjectManager()
    {
        $this->assertTrue($this->serviceManager->get('Matryoshka\Model\Object\ObjectManager')->has('User'));
        $this->assertInstanceOf(
            'Strapieno\User\Model\Entity\UserEntity',
            $this->serviceManager->get('Matryoshka\Model\Object\ObjectManager')->get('User')
        );
    }

    /**
     * @depends testHasUserEntityFromObjectManager
     */
    public function testIsUserEntityHydratorAware()
    {
        $this->assertInstanceOf(
            'Zend\Stdlib\Hydrator\HydratorAwareInterface',
            $this->serviceManager->get('Matryoshka\Model\Object\ObjectManager')->get('User')
        );
    }

    /**
     * @depends testHasUserEntityFromObjectManager
     * @depends testHasMongoDbService
     */
    public function testHasUserModelFromModelManager()
    {
        $this->assertTrue(
            $this->serviceManager->get('Matryoshka\Model\ModelManager')
                ->has('Strapieno\User\Model\UserModelService')
        );

        $this->assertInstanceOf(
            'Strapieno\User\Model\UserModelService',
            $this->serviceManager->get('Matryoshka\Model\ModelManager')
                ->get('Strapieno\User\Model\UserModelService')
        );
    }

    /**
     * @depends testHasUserModelFromModelManager
     */
    public function testSaveUser()
    {
        /** @var $service UserModelService */
         $service = $this->serviceManager->get('Matryoshka\Model\ModelManager')
                ->get('Strapieno\User\Model\UserModelService');

        /** @var $user UserInterface */
        $user = $this->serviceManager->get('Matryoshka\Model\Object\ObjectManager')->get('User');
        $user->setModel($service);
        $user->setUserName('test');
        $this->assertSame(1, $result = $user->save());
    }

    /**
     * @depends testSaveUser
     */
    public function testGetUser()
    {
        /** @var $service UserModelService */
        $service = $this->serviceManager->get('Matryoshka\Model\ModelManager')
            ->get('Strapieno\User\Model\UserModelService');

        $criteria = new UserMongoCollectionCriteria();
        $criteria->setUserName('test');

        $user = $service->find($criteria)->current();
        $this->assertInstanceOf('Strapieno\User\Model\Entity\UserEntity', $user);
    }

    /**
     * @depends testGetUser
     */
    public function testDeleteUser()
    {
        /** @var $service UserModelService */
        $service = $this->serviceManager->get('Matryoshka\Model\ModelManager')
            ->get('Strapieno\User\Model\UserModelService');

        $criteria = new UserMongoCollectionCriteria();
        $criteria->setUserName('test');

        $users = $service->find($criteria)->current();

        foreach($users as $user) {
             $this->assertSame(1, $result = $user->delete());
        }
    }
}
