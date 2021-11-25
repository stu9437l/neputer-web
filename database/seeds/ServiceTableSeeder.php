<?php

use Illuminate\Database\Seeder;

class ServiceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('services')->insert(
            [
            'title' => 'Logo & Branding Service',
            'slug' => 'logo-and-branding-service',
            'image' => 'branding.svg',
            'description' => 'Pellentesque in ipsum id orci porta dapibus. Praesent sapien massa, convallis a pellentesque nec, 
              egestas non nisi. Nulla quis lorem ut libero malesuada feugiat. Donec rutrum congue leo eget malesuada. Curabitur aliquet quam id dui posuere blandit',
            'status' => 1,
            'order' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ],
            [
            'title' => 'Website Design & Development',
            'slug' => 'website-design-and-development',
            'image' => 'website_design.svg',
            'description' => 'Pellentesque in ipsum id orci porta dapibus. Praesent sapien massa, convallis a pellentesque nec, 
              egestas non nisi. Nulla quis lorem ut libero malesuada feugiat. Donec rutrum congue leo eget malesuada. Curabitur aliquet quam id dui posuere blandit',
            'status' => 1,
            'order' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ],
            [
            'title' => 'Mobile App Development',
            'slug' => 'mobile-app-development',
            'image' => 'website_design.svg',
            'description' => 'Pellentesque in ipsum id orci porta dapibus. Praesent sapien massa, convallis a pellentesque nec, 
              egestas non nisi. Nulla quis lorem ut libero malesuada feugiat. Donec rutrum congue leo eget malesuada. Curabitur aliquet quam id dui posuere blandit',
            'status' => 1,
            'order' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ],
            [
            'title' => '',
            'slug' => 'Digital Marketing Service',
            'image' => 'website_design.svg',
            'description' => 'Pellentesque in ipsum id orci porta dapibus. Praesent sapien massa, convallis a pellentesque nec, 
              egestas non nisi. Nulla quis lorem ut libero malesuada feugiat. Donec rutrum congue leo eget malesuada. Curabitur aliquet quam id dui posuere blandit',
            'status' => 1,
            'order' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ],

        );
    }
}
