<?php
return [
    'assets' => [
        'theme' => [
            'panel' => [
                'css' => 'assets/panel/css/',
                'js' => 'assets/panel/js/',
                'avatars' => 'assets/panel/avatars/',
                'users' => 'image/users',
            ],
        ],
        'image_panel_folder' => [
            'avatars' => 'avatars',
            'user' => 'users',
            'page' => 'page',
            'products' => 'products',
            'slider' => 'sliders',
            'ads' => 'ads',
            'category' => 'category',
            'about_us' => 'about_us',
            'blog' => 'blog',
            'blog_category' => 'blog_category',
            'child_service' => 'child_service',
            'clients' => 'clients',
            'portfolio' => 'portfolio',
            'portfolio_category' => 'portfolio_category',
            'testimonial' => 'testimonial',
            'services' => 'services',
            'technology' => 'technology',
            'our-team' => 'our-team',
            'why-us' => 'why-us',
            'our-work' => 'our-work',
            'development-process' => 'development-process',
            'industries-we-work-for' => 'industries-we-work-for',
            'career' => 'career',
            'service_enquiry' => 'service_enquiry',
            'careers_enquiry' => 'careers_enquiry',
            'site_configuration'=>'site_configuration'

        ],
        'frontend' => [
            'css' => 'assets/frontend/',
            'js' => 'assets/frontend/',
        ],
    ],
    'image_dimensions' => [
        'users' => [
            ['width' => '50', 'height' => '50'],
            ['width' => '300', 'height' => '200'],
           ],
        'page' => [
            ['width' => '300', 'height' => '250'],
        ],
        'products' => [
            ['width' => '50', 'height' => '50'],
            ['width' => '200', 'height' => '150'],
            ['width' => '300', 'height' => '250'],
        ],
        'product_gallery_image' => [
            ['width' => '200', 'height' => '150'],
        ],

        'service' => [
            ['width' => '80' , 'height' => '80'],
            ['width' => '450', 'height'=> '400'],
        ],
    ],
     'default_languages' => [
        'en',
        'np',
      ],

    //for stripe payment in checkout
    'payment-gateways' => [
        'stripe' => [
            'credentials' => [
                "secret_key" => "sk_test_slacs8q2gKHRaGiodx9YfJEK",
                "publishable_key" => "pk_test_AhE5RPEOUUiBd8Tcc7wzMqHq"
            ]
        ]
    ]

];