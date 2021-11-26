<?php

use Illuminate\Database\Seeder;

class OurWorksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('our_works')->insert([
            [
                'name' => 'Ecommerce Development',
                'description' => 'Pellentesque in ipsum id orci porta dapibus. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. 
                                  Donec rutrum congue leo eget malesuada. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. 
                                  Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem',
                'images' => '16294450644714_image-d.jpg',
                'platform' => 'Web Development',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),

            ],
            [
                'name' => 'Creative App',
                'description' => 'Pellentesque in ipsum id orci porta dapibus. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. 
                                  Donec rutrum congue leo eget malesuada. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. 
                                  Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem',
                'images' => '16294451147727_image-1.jpg',
                'platform' => 'Android',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Brochure Design',
                'description' => 'Pellentesque in ipsum id orci porta dapibus. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. 
                                  Donec rutrum congue leo eget malesuada. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. 
                                  Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem',
                'images' => '16294451618147_image-6.jpg',
                'platform' => 'Graphics',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Icons',
                'description' => 'Pellentesque in ipsum id orci porta dapibus. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. 
                                  Donec rutrum congue leo eget malesuada. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. 
                                  Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem',
                'images' => '16294452045866_image-c.jpg',
                'platform' => 'Ios, Android',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
