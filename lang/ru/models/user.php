<?php

return [
    'entity_name'        => 'Пользователь',
    'entity_plural_name' => 'Пользователи',

    'fields' => [
        'name'      => 'Имя',
        'email'     => 'Электронная почта',
        'password'  => 'Пароль',
    ],

    'relationships' => [
        'profile' => 'Профиль'
    ]
];