<?php

use Illuminate\Database\Seeder;

class SliderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sliders')->insert([
            'alt_text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse faucibus, risus sit amet auctor sodales, justo erat tempor eros.',
            'caption'  => 'Slider Image',
            'rank'  => '1',
            'status'  => '1',
            'image'  => '16294438106646_app-develop.png',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
