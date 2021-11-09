<?php

use Illuminate\Database\Seeder;
use App\Model\ProductSection;

class ProductSectionTableSeeder extends Seeder
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
                'title' => 'Product Section One',
                'slug' => 'product-section-one',
            ],
            [
                'title' => 'Product Section Two',
                'slug' => 'product-section-two',
            ],
            [
                'title' => 'Product Section Three',
                'slug' => 'product-section-three',
            ],
        ];

        foreach ($datas as $row) {
            ProductSection::create($row);
        }


    }
}
