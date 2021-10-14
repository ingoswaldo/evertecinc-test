<?php

return [

    'place_to_pay' => [
        'login'   => env('PLACE_TO_PAY_LOGIN'),
        'tranKey' => env('PLACE_TO_PAY_TRAN_KEY'),
        'baseUrl' => env('PLACE_TO_PAY_URL'),
        'timeout' => env('PLACE_TO_PAY_TIMEOUT', 15),
    ]
];
