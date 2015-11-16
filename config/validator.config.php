<?php
return [
    'abstract_factories' => [
        'Strapieno\ModelUtils\Validator\AbstractArrayValidator'
    ],
    'initializers' => [
        'Strapieno\User\Model\UserModelInizializer'
    ],
    'invokables' => [
        'Strapieno\User\Model\Validator\UserNameAlreadyExist' => 'Strapieno\Auth\Model\Validator\UserNameAlreadyExist',
        'Strapieno\User\Model\Validator\EmailAlreadyExist' => 'Strapieno\Auth\Model\Validator\EmailAlreadyExist'
    ],
    'aliases' => [
        'user-usernamealreadyexist' => 'Strapieno\User\Model\Validator\UserNameAlreadyExist',
        'user-emailalreadyexist' => 'Strapieno\Auth\Model\Validator\EmailAlreadyExist'
    ]
];