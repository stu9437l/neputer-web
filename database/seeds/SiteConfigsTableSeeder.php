<?php

use Illuminate\Database\Seeder;

class SiteConfigsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('site_configs')->insert([
            [
                'key' => 'company',
                'value' => 'Neputer',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'key' => 'social',
                'value' => '{"facebook":null,"twitter":null,"instagram":null,"youtube":null}',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'key' => 'counter_1',
                'value' => '15',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'key' => 'counter_title_1',
                'value' => 'Year In Business',
                'created_at' => now(),
                'updated_at' => now()
            ],

            [
                'key' => 'footer_section_description',
                'value' => 'News letter dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt. Enter your email',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'key' => 'footer_button_link',
                'value' => 'https://neputer.com',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'key' => 'footer_button_text',
                'value' => 'Become Partner',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'key' => 'company_email',
                'value' => 'contact@neputer.com',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'key' => 'company_phone',
                'value' => '9801400589',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'key' => 'company_address',
                'value' => 'Narefat Kathmandu, Nepal',
                'created_at' => now(),
                'updated_at' => now()
            ],

            [
                'key' => 'icon1',
                'value' => '16294455029449_startup.svg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'key' => 'about_image',
                'value' => '16294455029449_startup.svg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'key' => 'contact_banner_image',
                'value' => '16294455029449_startup.svg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'key' => 'our_team_image',
                'value' => '16294455029449_startup.svg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'key' => 'development_process_image',
                'value' => '16294455029449_startup.svg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'key' => 'blog_banner',
                'value' => '16294455029449_startup.svg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'key' => 'career_image',
                'value' => '16294455029449_startup.svg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'key' => 'our_client_banner',
                'value' => '16294455029449_startup.svg',
                'created_at' => now(),
                'updated_at' => now()
            ],[
                'key' => 'service_detail_image',
                'value' => '16294455029449_startup.svg',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
