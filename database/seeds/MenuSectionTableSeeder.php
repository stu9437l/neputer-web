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
                'title' => 'Footer First Menu',
                'slug' => 'footer-1',
                'hint' => 'Placed After Contact Us',
            ],
            [
                'title' => 'Footer Last Menu',
                'slug' => 'footer-2',
                'hint' => 'Placed at last section menu',
            ],
        ];


        foreach ($data as $row) {
            \App\Model\MenuSection::create($row);
        }
    }
}
