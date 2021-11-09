<?php

use Illuminate\Database\Seeder;

class OfferSectionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datas = [
          [
              'title' => 'Top Section',
              'slug' => 'top-section'
          ],
            [
                'title' => 'Middle Section',
                'slug' => 'middle-section'
            ],
            [
                'title' => 'Bottom Section',
                'slug' => 'bottom-section'
            ]
        ];

        foreach($datas as $row){
            \App\Model\OfferSection::create($row);
        }


    }
}
