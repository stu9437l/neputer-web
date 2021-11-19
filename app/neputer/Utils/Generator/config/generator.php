<?php
/**
 * Neputer Configurations
 * @version 0.1.0
 */

return [

    'root_path' => base_path('neputer'),

    /*
    |--------------------------------------------------------------------------
    | Generator path configurations
    |--------------------------------------------------------------------------
    |
    | Where to generate the given entity
    |
    */
    'controller_namespace' => 'Admin',
    'path'                  => [
        'controller_path'   => app_path('Http/Controllers/Admin/'),
        'model_path'        => 'Entities',
        'trait_path'        => 'Traits',
        'view_path'         => 'Services',
        'service_path'      => 'Services',
        'request_path'      => 'Requests',
        'config_path'       => 'config',
        'observer_path'     => 'Observers',
    ],

    /*
    |--------------------------------------------------------------------------
    | Stubs path configurations
    |--------------------------------------------------------------------------
    |
    | Stubs to be pulled in from
    |
    */
    'stub'                     => [
        'controller_stub_path' => '',
        'model_stub_path'      => '',
        'trait_stub_path'      => '',
        'view_stub_path'       => '',
        'service_stub_path'    => '',
        'request_stub_path'    => '',
    ],

    /*
    |--------------------------------------------------------------------------
    | Stubs path configurations
    |--------------------------------------------------------------------------
    |
    | Stubs to be pulled in from
    |
    */
    'base_view_path' => base_path('resources/views/'.env('DEFAULT_THEME', 'default').'/views'),

    'view_structures' => [
        'create'      => 'create',
        'edit'        => 'edit',
        'index'       => 'index',
        'script'      => 'partials/scripts',
        'form'        => 'partials/form',
        'show'        => 'show',
        'table'       => 'partials/table',
    ],
];
