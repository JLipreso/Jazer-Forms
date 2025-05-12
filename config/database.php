<?php

return [
    'database_connection' => [
        'driver'        => 'mysql',
        'host'          => env('CONN_FORMS_IP', config('formsconfig.conn_forms_ip')),
        'port'          => env('CONN_FORMS_PT', config('formsconfig.conn_forms_pt')),
        'database'      => env('CONN_FORMS_DB', config('formsconfig.conn_forms_db')),
        'username'      => env('CONN_FORMS_UN', config('formsconfig.conn_forms_un')),
        'password'      => env('CONN_FORMS_PW', config('formsconfig.conn_forms_pw')),
        'charset'       => 'utf8mb4',
        'collation'     => 'utf8mb4_unicode_ci',
        'prefix'        => ''
    ],
];