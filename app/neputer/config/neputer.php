<?php

/**
 * Neputer Configurations
 * @version 0.1.0
 */

return [

    'backend_route_prefix' => 'admin',

    'default-image' => asset('assets/images/no_image.png'),

    'themes' =>[
        'default' => 'Default',
    ],

    'view_panel'  => [
        'backend' => [
            'index' => [

                'title' => 'List',
                'icon'  => 'fa-table'

            ],

            'create' => [

                'title' => 'Create',
                'icon'  => 'fa-create'

            ],

            'edit' => [

                'title' => 'Edit',
                'icon'  => 'fa-edit'

            ],

            'show' => [

                'title' => 'Show',
                'icon'  => 'fa-eye'

            ]

        ],
    ],

    'writing_rates' => [
        'use_range_selector' => 'true', // Do not make boolean
        'word_count_types' => [
            'min-words',
            'min-max-range'
        ],
        'word_count_range' => [
            'min' => 10,
            'max' => 1000
        ],
        'standard_rate' => [
            'min' => 1,
            'max' => 5000
        ],
    ],

    'role' => [
        'roles' => [
            'admin', 'writer'
        ],
        'role_detail' => [
            'admin' => [
                'title' => 'Admin',
                'key' => 'admin',
                'details' => ''
            ],
            'writer' => [
                'title' => 'Writer',
                'key' => 'writer',
                'details' => ''
            ],
        ],
    ],

    'assets' => [
        'panel_image_folders' => [
            'ads' => 'ads',
            'post' => 'post',
            'site-setting' => 'site-setting',
            'page'        => 'page',
            'users'       => 'users',
            'business'    => 'business',
            'package'     => 'package' ,
            'booking'     => 'booking' ,
            'activity'    => 'activity' ,
            'testimonial' => 'testimonial' ,
            'sitesetting' => 'sitesetting' ,
            'destination' => 'destination' ,
            'slider' => 'slider' ,
            'representative' => 'representative' ,
        ],
    ],

    'image-dimensions' => [
        'post' => [
            ['width' => 600, 'height' => 400],
            ['width' => 400, 'height' => 200],
            ['width' => 36, 'height' => 36],
        ],
        'site-setting' => [
            ['width' => 234, 'height' => 65],
        ],
        'page' => [
            ['width' => 400, 'height' => 200],
        ],
        'users' => [
            ['width' => 400, 'height' => 200],
        ],
        'business' => [
            ['width' => 400, 'height' => 200],
        ],
        'package' => [
            ['width' => 380, 'height' => 276],
        ],
        'activity' => [
            ['width' => 200, 'height' => 150],
            ['width' => 790, 'height' => 445],
        ],
        'destination' => [
            ['width' => 200, 'height' => 150],
            ['width' => 790, 'height' => 445],
        ],
        'testimonial' => [
            ['width' => 200, 'height' => 150],
        ],
        'sitesetting' => [
            ['width' => 234, 'height' => 65],
        ],
        'slider' => [
            ['width' => 1080, 'height' => 720],
        ],
        'representative' => [
            ['width' => 400, 'height' => 200],
        ],
    ],

    'default_categories' => [
        [
            'title' => 'Biography',
            'slug' => 'biography',
            'status' => 1
        ],
        [
            'title' => 'Sports',
            'slug' => 'sports',
            'status' => 1
        ]
    ],

    'country' =>[
        'nepal' =>'Nepal',
        'india' =>'India',
        'china' =>'China',
        'bhutan' =>'Bhutan',
    ],

    'option' => [
        'users' => [
            'gender' => [
                'male'   => 'Male',
                'female' => 'Female',
                'other'  => 'Other Posibility',
            ],
        ],

        'page' => [
            'page-type' => [
                'page' => [
                    'key'   => 'page',
                    'title' => 'Page',
                ],
                'category' => [
                    'key'   => 'category',
                    'title' => 'Category',
                ],
                'home' => [
                    'key'   => 'home',
                    'title' => 'Home',
                ],
            ],
        ],

        'page_section' =>[
            'page' => [
                'home' => [
                    'key'   => 'home',
                    'title' => 'Home',
                ],
                'categories' => [
                    'key'   => 'categories',
                    'title' => 'Categories',
                ],
            ]
        ]
    ],

    'content_type' => [
        'image' => 'Image',
        'quote' => 'Quote',
        'social-media' => 'Social Media',
        'video' => 'Video',
     ],

    'page_ad_sections' => [
        'page-group' => [
            'home' => [
                'title' => 'Home Page',
                'icon' => '<i class="icon-home"></i>',
                'class' => 'panel panel-teal pricing-big',
                'has_multiple_page' => false,
                'page' => [
                    'main-page' => [
                        'title' => 'Main Page',
                        'sections' => [
                            'Buttom-ad' => [
                                'key' => 'page-buttom-ad',
                                'title' => 'Page Buttom Ad',
                                'hint' => 'Buttom of the Page',
                                'ad_dimension' => '1400 / 150',
                            ],
                        ],
                    ],
                ],
            ],
            'category' => [
                'title' => 'Category Page',
                'icon' => '<i class="icon-group"></i>',
                'class' => 'panel panel-purple pricing-big',
                'has_multiple_page' => false,
                'page' => [
                    'main-page' => [
                        'title' => 'Main Page',
                        'sections' => [
                            'ad-section-1' => [
                                'key' => 'ad-section-1',
                                'title' => 'Ad Section 1',
                                'hint' => 'after menu',
                                'ad_dimension' => '1400 / 150',
                            ],
                            'ad-section-2' => [
                                'key' => 'ad-section-2',
                                'title' => 'Ad Section 2',
                                'hint' => 'above footer',
                                'ad_dimension' => '1400 / 150',
                            ],
                        ],
                    ],
                ],
            ],
            'detail' => [
                'title' => 'Details Page',
                'icon' => '<i class="icon-group"></i>',
                'class' => 'panel panel-greenLight pricing-big',
                'has_multiple_page' => false,
                'page' => [
                    'main-page' => [
                        'title' => 'Main Page',
                        'sections' => [
                            'ad-section-1' => [
                                'key' => 'ad-section-1',
                                'title' => 'Ad Section 1',
                                'hint' => 'header ad',
                                'ad_dimension' => '1400 / 150',
                            ],
                            'ad-section-2' => [
                                'key' => 'ad-section-2',
                                'title' => 'Ad Section 2',
                                'hint' => 'after first image',
                                'ad_dimension' => '850 / 150',
                            ],
                            'ad-section-3' => [
                                'key' => 'ad-section-3',
                                'title' => 'Ad Section 3',
                                'hint' => 'below related post',
                                'ad_dimension' => '1400 / 150',
                            ],
                            'ad-section-4' => [
                                'key' => 'ad-section-4',
                                'title' => 'Ad Section 4',
                                'hint' => 'below table',
                                'ad_dimension' => '1400 / 150',
                            ],
                            'ad-section-5' => [
                                'key' => 'ad-section-5',
                                'title' => 'Ad Section 5',
                                'hint' => 'below tags',
                                'ad_dimension' => '1400 / 150',
                            ],
                            'ad-section-6' => [
                                'key' => 'ad-section-6',
                                'title' => 'Ad Section 6',
                                'hint' => 'below comment form',
                                'ad_dimension' => '1400 / 150',
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],

    'image_dimension_post' => [
        1920 .'*'. 1080,
        1280 .'*'. 720,
    ],

    'summary_word_limit' => [
        'home_page_first_category_word_limit' => '250',
        'home_page_other_category_word_limit' => '110',
        'category_page_highlighted_post_word_limit' => '130',
        'category_page_remaining_post_word_limit' => '110',
    ],

    'limits' => [
        'home_page_package' => 6,
        'home_page_activities' => 6,
        'search_page_load_more' => 4,
    ],
    'travel_email' => [
        'key' =>  'bookingtrick@gmail.com'
    ],
    'default_price' => 7
];
