<?php

return [

    'place_to_pay' => [

        'login'      => env('PLACE_TO_PAY_LOGIN'),
        'tran_key'   => env('PLACE_TO_PAY_TRAN_KEY'),
        'url'        => env('PLACE_TO_PAY_URL'),
        'return_url' => env('PLACE_TO_PAY_RETURN_URL'),

        'rest' => [

            'timeout'         => env('PLACE_TO_PAY_TIMEOUT', 15),
            'connect_timeout' => env('PLACE_TO_PAY_CONNECT_TIMEOUT', 5)
        ]
    ]
];
