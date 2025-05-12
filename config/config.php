<?php

return [
    /** Project Configurations */
    'project_refid'                 => env('PROJECT_REFID', ''),


    /** Database Connection Configurations */
    'conn_forms_ip'                 => env('CONN_FORMS_IP', env('DB_HOST')),
    'conn_forms_pt'                 => env('CONN_FORMS_PT', env('DB_PORT')),
    'conn_forms_db'                 => env('CONN_FORMS_DB', env('DB_DATABASE')),
    'conn_forms_un'                 => env('CONN_FORMS_UN', env('DB_USERNAME')),
    'conn_forms_pw'                 => env('CONN_FORMS_PW', env('DB_PASSWORD')),

    /** Query parameters */
    'fetch_paginate_max'            => env('FETCH_PAGINATE_MAX', 25),
];
