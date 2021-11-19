<?php

$today = \Carbon\Carbon::now();
$last_modified_date = $today->subDays(20);

return [
    'sitemap' => [
        'main' => [
            [
                'name' => 'Page',
                'route' => 'sitemap.page',
                'last_modified_date' => $last_modified_date
            ],
            [
                'name' => 'Category',
                'route' => 'sitemap.category',
                'last_modified_date' => $today->subDays(5)
            ],
            [
                'name' => 'Post',
                'route' => 'sitemap.post',
                'last_modified_date' => $today->subDays(5)
            ],

        ],
        'pages' => [
            [
                'name' => 'Home Page',
                'route' => 'home',
                'last_modified_date' => $last_modified_date
            ],

        ],
    ],

];
