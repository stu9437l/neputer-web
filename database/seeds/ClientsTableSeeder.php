<?php

use Illuminate\Database\Seeder;

class ClientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clients')->insert([
            [
                'title' => 'Shutter Speed',
                'link' => 'https://v2.neputertech.com/',
                'image' => '16294439626493_clients-1.png',
                'description' => null,
                'status' => 1,
                'order' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'title' => 'Hipster',
                'link' => 'https://v2.neputertech.com/',
                'image' => '16294440746393_clients-2.png',
                'description' => null,
                'status' => 1,
                'order' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'title' => 'Happy',
                'link' => 'https://v2.neputertech.com/',
                'image' => '16294440844710_clients-3.png',
                'description' => null,
                'status' => 1,
                'order' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'title' => 'The Retro Studio',
                'link' => 'https://v2.neputertech.com/',
                'image' => '16294440844710_clients-4.png',
                'description' => null,
                'status' => 1,
                'order' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'title' => 'Travel',
                'link' => 'https://v2.neputertech.com/',
                'image' => '16294441128072_clients-5.png',
                'description' => null,
                'status' => 1,
                'order' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'title' => 'Coffee',
                'link' => 'https://v2.neputertech.com/',
                'image' => '16294441215923_clients-6.png',
                'description' => null,
                'status' => 1,
                'order' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'title' => 'Bakery',
                'link' => 'https://v2.neputertech.com/',
                'image' => '16294443714707_clients-7.png',
                'description' => null,
                'status' => 1,
                'order' => 7,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'title' => 'Iconic',
                'link' => 'https://v2.neputertech.com/',
                'image' => '16294443835200_clients-8.png',
                'description' => null,
                'status' => 1,
                'order' => 8,
                'created_at' => now(),
                'updated_at' => now(),
            ],[
                'title' => 'New Wave',
                'link' => 'https://v2.neputertech.com/',
                'image' => '16294443965670_clients-9.png',
                'description' => null,
                'status' => 1,
                'order' => 9,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
