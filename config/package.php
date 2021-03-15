<?php
$state =  [
        -1 => 'deleted',
        0 => 'shipped',
        1 => 'confirmed',
        2 => 'partially purchased',
        3 => 'fully purchased',
        4 => 'arrived'
    ];
return [
    'state' => $state,
    'keyState' => array_flip($state),
    'badge_color' => [
        0 => 'badge-info',
        1 => 'badge-primary',
        2 => 'badge-danger',
        3 => 'badge-success',
        4 => 'badge-info'
    ],
    'status' => [
        1 => 'Active',
        2 => 'Inactive'
    ]
];
