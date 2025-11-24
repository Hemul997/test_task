<?php

return [
    'entity_name'         => 'Новость',
    'entity_plural_name'  => 'Новости',

    'fields' => [
        'title'       => 'Заголовок',
        'topic'       => 'Тема',
        'description' => 'Описание',
        'author_id'   => 'ID автора'
    ],

    'relationships' => [
        'author' => 'Автор'
    ]
];