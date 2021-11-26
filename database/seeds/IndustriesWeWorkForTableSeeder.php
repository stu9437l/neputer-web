<?php

use Illuminate\Database\Seeder;

class IndustriesWeWorkForTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('industries_we_work_for')->insert([
            [
                'image' => '16294446145709_icon-1.png',
                'title' => 'Social Networking',
                'link' => 'http://v2.neputertech.bro/',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],[
                'image' => '16294446427167_icon-2.png',
                'title' => 'Digital Marketing',
                'link' => 'http://v2.neputertech.bro/',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],[
                'image' => '16294447839636_icon-3.png',
                'title' => 'Ecommerce Development',
                'link' => 'http://v2.neputertech.bro/',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],[
                'image' => '16294448007574_icon-4.png',
                'title' => 'Video Service',
                'link' => 'http://v2.neputertech.bro/',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],[
                'image' => '16294448175751_icon-5.png',
                'title' => 'Banking Service',
                'link' => 'http://v2.neputertech.bro/',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],[
                'image' => '16294448328902_icon-6.png',
                'title' => 'Enterprise Service',
                'link' => 'http://v2.neputertech.bro/',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],[
                'image' => '16294448437719_icon-7.png',
                'title' => 'Education Service',
                'link' => 'http://v2.neputertech.bro/',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],[
                'image' => '16294448566923_icon-8.png',
                'title' => 'Tour and Travels',
                'link' => 'http://v2.neputertech.bro/',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],[
                'image' => '16294448727214_icon-9.png',
                'title' => 'Health Service',
                'link' => 'http://v2.neputertech.bro/',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],[
                'image' => '16294448867767_icon-10.png',
                'title' => 'Event & Ticket',
                'link' => 'http://v2.neputertech.bro/',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],[
                'image' => '16294448996060_icon-11.png',
                'title' => 'Restaurant Service',
                'link' => 'http://v2.neputertech.bro/',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],[
                'image' => '16294448996060_icon-11.png',
                'title' => 'Business Consultant',
                'link' => 'http://v2.neputertech.bro/',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
