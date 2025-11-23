<?php

return [
    'entity_name' => 'Новость',

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