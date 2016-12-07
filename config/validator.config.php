<?php
return [
    'abstract_factories' => [
        'Strapieno\Utils\Validator\AbstractArrayValidator'
    ],
    'initializers' => [
        'Strapieno\User\Model\UserModelInitializer'
    ],
    'invokables' => [
        'Strapieno\User\Model\Validator\UserNameUnique' => 'Strapieno\User\Model\Validator\UserNameUnique',
        'Strapieno\User\Model\Validator\EntityExist' => 'Strapieno\User\Model\Validator\EntityExist',
        'Strapieno\User\Model\Validator\EmailUnique' => 'Strapieno\User\Model\Validator\EmailUnique',
        'Strapieno\User\Model\Validator\EmailExist' => 'Strapieno\User\Model\Validator\EmailExist'
    ],
    'aliases' => [
        'user-usernameunique' => 'Strapieno\User\Model\Validator\UserNameUnique',
        'user-emailunique' => 'Strapieno\User\Model\Validator\EmailUnique',
        'user-entityexist' => 'Strapieno\User\Model\Validator\EntityExist',
        'user-emailexist' => 'Strapieno\User\Model\Validator\EmailExist'
    ]
];