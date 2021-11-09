<?php

use Illuminate\Database\Seeder;

class MenuSectionTableSeeder extends Seeder
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
                'title' => 'INFORMATION',
                'slug' => 'footer-1',
                'hint' => 'Footer 1',
            ],
            [
                'title' => 'MY ACCOUNT',
                'slug' => 'footer-2',
                'hint' => 'Footer 2',
            ],
            [
                'title' => 'CUSTOMER SERVICE',
                'slug' => 'footer-3',
                'hint' => 'Footer 3',
            ],
            [
                'title' => 'EXTRAS',
                'slug' => 'footer 4',
                'hint' => 'Footer 4',
            ],
        ];


        foreach ($data as $row) {
            \App\Model\MenuSection::create($row);
        }
    }
}
