<?php
return [
    'invokables' => [
        'Strapieno\User\Model\Hydrator\Mongo\UserModelMongoHydrator'
            => 'Strapieno\User\Model\Hydrator\Mongo\UserModelMongoHydrator'
    ],
    'aliases' => [
        'Strapieno\User\Model\Hydrator\UserModelMongoHydrator'
            => 'Strapieno\User\Model\Hydrator\Mongo\UserModelMongoHydrator'
    ]
];