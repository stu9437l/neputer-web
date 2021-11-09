<?php

use Illuminate\Database\Seeder;
use App\Model\AdsSection;

class AdSectionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'title' => 'Top Bar Menu',
                'slug' => 'top-bar-menu',
                'hint' => 'Placed in site top bar',
            ],
            [
                'title' => 'Navigation Bar Menu',
                'slug' => 'navigation-bar-menu',
                'hint' => 'Placed in navigation bar',
            ],
            [
                'title' => 'BUYER CENTRAL',
                'slug' => 'footer-1',
                'hint' => 'Footer 1',
            ],
            [
                'title' => 'MERCHANT CENTRAL',
                'slug' => 'footer-2',
                'hint' => 'Footer 2',
            ],

        ];

        foreach ($data as $row) {
            AdsSection::create($row);
        }
    }
}
