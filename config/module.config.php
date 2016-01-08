<?php
return [
    'service_manager' => [
        'abstract_factories' => [
            'Matryoshka\Model\Wrapper\Mongo\Service\MongoDbAbstractServiceFactory',
            'Matryoshka\Model\Wrapper\Mongo\Service\MongoCollectionAbstractServiceFactory'
        ],
        'invokables' => [
            'Strapieno\User\Model\Criteria\Mongo\UserMongoCollectionCriteria'
                => 'Strapieno\User\Model\Criteria\Mongo\UserMongoCollectionCriteria',
            'Matryoshka\Model\Wrapper\Mongo\Criteria\Isolated\ActiveRecordCriteria'
                => 'Matryoshka\Model\Wrapper\Mongo\Criteria\Isolated\ActiveRecordCriteria',
            'Matryoshka\Model\Wrapper\Mongo\Criteria\ActiveRecord\ActiveRecordCriteria'
                => 'Matryoshka\Model\Wrapper\Mongo\Criteria\ActiveRecord\ActiveRecordCriteria',
            'Matryoshka\Model\Wrapper\Mongo\ResultSet\HydratingResultSet' =>
                'Matryoshka\Model\Wrapper\Mongo\ResultSet\HydratingResultSet'
        ],
        'aliases' => [
            'Strapieno\User\Model\Criteria\UserCollectionCriteria'
                => 'Strapieno\User\Model\Criteria\Mongo\UserMongoCollectionCriteria',
            'Strapieno\Model\Criteria\IsolatedActiveRecordCriteria'
                => 'Matryoshka\Model\Wrapper\Mongo\Criteria\Isolated\ActiveRecordCriteria',
                'Strapieno\Model\Criteria\NotIsolatedActiveRecordCriteria'
                => 'Matryoshka\Model\Wrapper\Mongo\Criteria\ActiveRecord\ActiveRecordCriteria',
            'Strapieno\Model\ResultSet\HydratingResultSet'
                => 'Matryoshka\Model\Wrapper\Mongo\ResultSet\HydratingResultSet',
        ],
        'shared' => [
            // Do not share instance of ResultSet to avoid collisions on prototype strategies,
            'Matryoshka\Model\Wrapper\Mongo\ResultSet\HydratingResultSet' => false,
        ]
    ],
    'mongodb' => [
        'Mongo\Db' => [
            'database' => 'strapieno',
        ],
    ],
    'mongocollection' => [
        'DataGateway\Mongo\User' => [
            'database' => 'Mongo\Db',
            'collection' => 'user',
        ],
    ],
    'matryoshka-objects' => [
        'User' => [
            'type' => 'Strapieno\User\Model\Entity\UserEntity',
            'active_record_criteria' => 'Strapieno\Model\Criteria\NotIsolatedActiveRecordCriteria'
        ],
    ],
    'matryoshka-models' => [
        'Strapieno\User\Model\UserModelService' => [
            'datagateway' => 'DataGateway\Mongo\User',
            'type' => 'Strapieno\User\Model\UserModelService',
            'object' => 'User',
            'resultset' => 'Strapieno\Model\ResultSet\HydratingResultSet',
            'paginator_criteria' => 'Strapieno\User\Model\Criteria\UserCollectionCriteria',
            'hydrator' => 'Strapieno\User\Model\Hydrator\UserModelMongoHydrator',
            'listeners' => [
                'Strapieno\Utils\Model\Listener\DateAwareListener',
            ],
        ],
    ],
];
