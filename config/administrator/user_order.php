<?php
return [
    'title' => 'Закази користувачів',
    'single' => 'Закази користувачів',
    'model' => 'App\UserOrder',
    /**
     * The display columns
     */
    'columns' => [
        'name' => [
            'title' => 'Ім\'я заказчика'
        ],
        'type' => [
            'title' => 'Тип'
        ],
        'shop' => [
            'title' => 'Заклад'
        ],

        'phone' => [
            'title' => 'Телефон',
        ],
        'time' => [
            'title' => 'Час',
        ],
    ],
    /**
     * The editable fields
     */
    'edit_fields' => [
        'phone' => [
            'title' => 'Телефон',
            'type' => 'text',
        ],

        'name' => [
            'title' => 'Имя',
            'type' => 'text',
        ],
    ],
    /**
     * The filter fields
     *
     * @type array
     */
    'filters' => [
        'id',
        'name' => [
            'title' => 'Имя',
        ]
    ],

];