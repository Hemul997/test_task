<?php

use App\Enums\UserGenderEnum;

return [
    'options' => [
        UserGenderEnum::MALE->value    => 'мужской',
        UserGenderEnum::FEMALE->value  => 'женский',
        UserGenderEnum::UNKNOWN->value => 'не указан',
    ],
];
