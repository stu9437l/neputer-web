<?php

use Illuminate\Database\Seeder;

class TestimonialTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('testimonials')->insert([
            [
                'testimonial_by' => 'Client-1',
                'designation' => null,
                'image' => '16294471767394_girl2.jpg',
                'address' => 'Address-1',
                'testimonial' => 'Vestibule ante ipsum primes in faucets orc luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Donec rutrum congue leo eget malesuada. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Quisque velit nisi, pretium ut lacinia in, elementum id enim.',
                'status' => 1,
                'order' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],[
                'testimonial_by' => 'Client-2',
                'designation' => null,
                'image' => 'testing1.jpg',
                'address' => 'Address-2',
                'testimonial' => 'Vestibule ante ipsum primes in faucets orc luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Donec rutrum congue leo eget malesuada. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Quisque velit nisi, pretium ut lacinia in, elementum id enim.',
                'status' => 1,
                'order' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],[
                'testimonial_by' => 'Client-3',
                'designation' => null,
                'image' => 'testing1.jpg',
                'address' => 'Address-3',
                'testimonial' => 'Vestibule ante ipsum primes in faucets orc luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Donec rutrum congue leo eget malesuada. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Quisque velit nisi, pretium ut lacinia in, elementum id enim.',
                'status' => 1,
                'order' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
