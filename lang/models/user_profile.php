<?php

return [
    'entity_name' => 'Профиль пользователя',

    'fields' => [
        'gender'    => 'Пол',
        'birthday'  => 'Дата рождения',
        'phone'     => 'Номер телефона',
    ],

    'relationships' => [
        'user' => 'Пользователь'
    ]
];