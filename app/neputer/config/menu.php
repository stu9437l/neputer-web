<?php
/**
 * Menu Configurations
 * @version 0.1.0
 */

return [

    /**
     * All route will be prefixed by config('neputer.backend_route_prefix')
     */
    'admin' => [
        'Dashboard' => [
            'route' => 'dashboard.index',
            'icon'  => 'fa fa-home',
        ],

        'Ads'    => [
            'icon'           => 'fa fa-font',
            'route'          => 'ads',
            'sub-item'       => [
                'Add'  => [
                    'route' => 'ads.create',
                ],
                'List' => [
                    'route' => 'ads.index',
                ]
            ],
        ],

//        'Exam Mark Ledger'    => [
//            'icon'           => 'fa fa-vcard',
//            'route'          => 'exam_mark_ledger',
//            'sub-item'       => [
//                'Add'  => [
//                    'route' => 'exam_mark_ledger.create',
//                ],
//                'List' => [
//                    'route' => 'exam_mark_ledger.index',
//                ]
//            ],
//        ],


        'User'    => [
            'icon'           => 'fa fa-user',
            'route'          => 'users',
            'sub-item'       => [
                'Add'  => [
                    'route' => 'users.add_user',
                ],
                'List' => [
                    'route' => 'users.index',
                ]
            ],
        ],

//        'School'    => [
//            'icon'           => 'fa fa-book',
//            'route'          => 'school',
//            'sub-item'       => [
//                'Add'  => [
//                    'route' => 'school.create',
//                ],
//                'List' => [
//                    'route' => 'school.index',
//                ]
//            ],
//        ],
//
//        'Student'    => [
//            'icon'           => 'fa fa-linux',
//            'route'          => 'student',
//            'sub-item'       => [
//                'Add'  => [
//                    'route' => 'student.create',
//                ],
//                'List' => [
//                    'route' => 'student.index',
//                ]
//            ],
//        ],
//
//        'Roles & Privileges' => [
//            'icon'           => 'fa fa-flag',
//            'route'          => [ 'role', 'permissiongroup', 'permission', ],
//            'sub-item'       => [
//                'Role'       => [
//                    'icon'   => 'fa fa-paw',
//                    'route'  => 'role',
//                    'sub-item' => [
//                        'Add'  => [
//                            'route' => 'role.create',
//                        ],
//                        'List' => [
//                            'route' => 'role.index',
//                        ]
//                    ],
//                ],
//                'Group'      => [
//                    'icon'   => 'fa fa-sitemap',
//                    'route'   => 'permissiongroup',
//                    'sub-item' => [
////                        'Add'  => [
////                            'route' => 'permissiongroup.create',
////                        ],
//                        'List' => [
//                            'route' => 'permissiongroup.index',
//                        ]
//                    ],
//                ],
//                'Permission' => [
//                    'icon'   => 'fa fa-terminal',
//                    'route'  => 'permission',
//                    'sub-item' => [
//                        'Add'  => [
//                            'route' => 'permission.create',
//                        ],
//                        'List' => [
//                            'route' => 'permission.index',
//                        ]
//                    ],
//                ],
//            ],
//
//        ],
//
//        'Setting'   => [
//            'icon'  => 'fa fa-cogs',
//
//            'sub-item' => [
//
//            ],
//
//        ],
    ],

];
