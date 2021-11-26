<?php

use Illuminate\Database\Seeder;

class AboutUsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('about_us')->insert([
            'title' => 'WE ARE CREATIVE AGENCY',
            'image' => '16294459875233_about-image.png',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. Lorem Ipsum is simply dummy text of the printing and typesetting industry.
             Lorem Ipsum is simply dummy text of the printing and typesetting industry. is simply dummy text of the printing and typesetting industry',
            'status' => '1',
            'order' => '1',
            'created_at' => now(),
            'updated_at' => now(),

        ]);
    }
}
