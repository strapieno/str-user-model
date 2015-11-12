<?php
return [
    'abstract_factories' => [
        'Strapieno\ModelUtils\Validator\AbstractArrayValidator'
    ],
    'invokables' => [
        'Strapieno\User\Model\Hydrator\Mongo\UserModelMongoHydrator'
            => 'Strapieno\User\Model\Hydrator\Mongo\UserModelMongoHydrator'
    ]
];