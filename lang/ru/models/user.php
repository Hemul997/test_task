<?php

return [
    'entity_name' => 'Пользователь',

    'fields' => [
        'name'      => 'Имя',
        'email'     => 'Электронная почта',
        'password'  => 'Пароль',
    ],

    'relationships' => [
        'profile' => 'Профиль'
    ]
];