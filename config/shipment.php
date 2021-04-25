<?php

return [
    'status' => [
        'in_transit' => 1,
        'arrived' => 2,
        'delivered' => 3,
        'cancelled' => 4,
        'shipped' => 5,
        'new' => 6,
    ],
    'transport' => [
        'air' => 1,
        'sea' => 2
    ],
    'keyTransport' => [
        1 => 'air',
        2 => 'sea'
    ],
    'keyStatus' => [
        1 => 'In transet',
        2 => 'Arrived',
        3 => 'Delivered',
        4 => 'Received'

    ],
    'badges' => [
        1 => 'badge-success',
        2 => 'badge-info',
        3 => 'badge-success'
    ]
];
