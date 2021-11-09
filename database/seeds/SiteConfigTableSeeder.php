<?php

use Illuminate\Database\Seeder;

class SiteConfigTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'domain_name' => '',
            'email' => '',
            'logo' => '',
            'social_links' => json_encode([
                'fb_link' => '',
                'twitter_link' => '' ,
                'instagram_link' => '',
            ])
        ];

        foreach ($data as $key => $value){

            \App\Model\SiteConfig::create([
               'config_keys' => $key,
                'config_values' => $value
            ]);
        }
    }
}
