<?php
return [
    'title' => 'Заказы',
    'single' => 'заказ',
    'model' => 'App\Order',
    /**
     * The display columns
     */
    'columns' => [
        'name' => [
            'title' => 'Имя'
        ],
        'email' => [
            'title' => 'Email'
        ],
        'type' => [
            'title' => 'Тип'
        ],
        'shop' => [
            'title' => 'Заклад'
        ],
        'id' => [
            'title' => 'Дата бронирования',
            'output' => function ($value){
                $time = DB::select('select * from times where order_id = '. $value);

                $strTime = "";
                foreach ($time as $val) {

                    $strTime = $strTime . date('Y-m-d: H ', strtotime('+1 hour', $val->time)) /*. "-" . date('H', strtotime("+1 hour", $val->time))*/ . "<br>";;
                }
                return $strTime;
            }
        ],

        'description' => [
            'title' => 'Примечания'
        ],
        'phone' => [
            'title' => 'Телефон',
        ],
       /* 'card_number' => [
            'title' => 'Дисконт'
        ],*/
        'total_summ' => [
            'title' => 'Сумма к оплате'
        ],
        'is_paid' => [
            'title' => 'Оплачено',
            'output' => function ($value){
                if ($value == 1){
                    return "Да";
                } else {
                    return "Нет";
                }

            }
        ],
    ],
    /**
     * The editable fields
     */
    'edit_fields' => [
        'email' => [
            'title' => 'email',
            'type' => 'text',
        ],
        'description' => [
            'title' => 'Примечание',
            'type' => 'text',
        ],
        'phone' => [
            'title' => 'Телефон',
            'type' => 'text',
        ],
        'user_id' => [
            'title' => 'Позльзователь',
            'type' => 'text',
        ],
        'type' => [
            'title' => 'Тип',
            'type' => 'text',
        ],
        'room' => [
            'title' => 'Зал',
            'type' => 'text',
        ],
        'name' => [
            'title' => 'Имя',
            'type' => 'text',
        ],

       /* 'card_number' => [
            'title' => 'Дисконт',
            'type' => 'text',
        ],*/
        'total_summ' => [
            'title' => 'Сумма к оплате',
            'type' => 'text',
        ],
        'is_paid' => [
            'title' => 'Оплачено',
            'type' => 'bool',
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
        ],
        'Email' => [
            'title' => 'Email',
        ],
        'is_paid' => [
            'title' => 'Оплачено',
            'type' => 'bool'
        ],
    ],

];