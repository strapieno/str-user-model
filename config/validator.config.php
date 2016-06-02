<?php
return [
    'abstract_factories' => [
        'Strapieno\Utils\Validator\AbstractArrayValidator'
    ],
    'initializers' => [
        'Strapieno\User\Model\UserModelInitializer'
    ],
    'invokables' => [
        'Strapieno\User\Model\Validator\UserNameAlreadyExist' => 'Strapieno\User\Model\Validator\UserNameAlreadyExist',
        'Strapieno\User\Model\Validator\EmailAlreadyExist' => 'Strapieno\User\Model\Validator\EmailAlreadyExist'
    ],
    'aliases' => [
        'userusernamealreadyexist' => 'Strapieno\User\Model\Validator\UserNameAlreadyExist',
        'useremailalreadyexist' => 'Strapieno\User\Model\Validator\EmailAlreadyExist'
    ]
];