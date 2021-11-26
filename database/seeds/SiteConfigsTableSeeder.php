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
            ], [
                'key' => 'social',
                'value' => '{"facebook":null,"twitter":null,"instagram":null,"youtube":null}',
                'created_at' => now(),
                'updated_at' => now()
            ], [
                'key' => 'counter_1',
                'value' => '15',
                'created_at' => now(),
                'updated_at' => now()
            ], [
                'key' => 'counter_title_1',
                'value' => 'Year In Business',
                'created_at' => now(),
                'updated_at' => now()
            ], [
                'key' => 'footer_4',
                'value' => '<p>Latest Blogs</p>

<p><a href="#"><img alt="blog" src="images/blog/blog-small.jpg" /></a></p>

<p>April 15, 2020</p>

<p><a href="blog-sngle.html">We Provide you Best &amp; Creative Consulting Service</a></p>

<p>&nbsp;</p>

<p><a href="#"><img alt="blog" src="images/blog/blog-small.jpg" /></a></p>

<p>April 15, 2020</p>

<p><a href="blog-sngle.html">We Provide you Best &amp; Creative Consulting Service</a></p>',
                'created_at' => now(),
                'updated_at' => now()
            ], [
                'key' => 'footer_3',
                'value' => '<p><strong>Company</strong></p><p>&nbsp;</p><ul><li><p>Contact</p></li><li><p>Customer&#39;s FAQ</p></li>
	<li>
	<p>Refund Policy</p>
	</li>
	<li>
	<p><a href="javascript:void(0)">Privacy Policy</a></p>
	</li>
	<li>
	<p><a href="javascript:void(0)">Terms and Conditions</a></p>
	</li>
	<li>
	<p><a href="javascript:void(0)">License &amp; Copyright</a></p>
	</li>
	<li><a href="javascript:void(0)">Refund Policy</a></li></ul>',
                'created_at' => now(),
                'updated_at' => now()
            ], [
                'key' => 'footer_2',
                'value' => '<p><strong>Contact Us</strong></p><p>&nbsp;</p><ul><li><p>Email : neputertech@gmail.com</p></li><li><p>Phone : 9814500998</p></li><li><p>Address : Narephant-32 jadibuti</p></li></ul><p>&nbsp;</p>',
                'created_at' => now(),
                'updated_at' => now()
            ], [
                'key' => 'footer_1',
                'value' => '<p>News letter dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt. Enter your email</p><ul><li>&nbsp;</li></ul>',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'key' => 'icon1',
                'value' => '16294455029449_startup.svg',
                'created_at' => now(),
                'updated_at' => now()
            ],[
                'key' => 'about_image',
                'value' => '16294455029449_startup.svg',
                'created_at' => now(),
                'updated_at' => now()
            ],[
                'key' => 'contact_banner_image',
                'value' => '16294455029449_startup.svg',
                'created_at' => now(),
                'updated_at' => now()
            ],[
                'key' => 'our_team_image',
                'value' => '16294455029449_startup.svg',
                'created_at' => now(),
                'updated_at' => now()
            ],[
                'key' => 'development_process_image',
                'value' => '16294455029449_startup.svg',
                'created_at' => now(),
                'updated_at' => now()
            ],[
                'key' => 'blog_banner',
                'value' => '16294455029449_startup.svg',
                'created_at' => now(),
                'updated_at' => now()
            ],[
                'key' => 'career_image',
                'value' => '16294455029449_startup.svg',
                'created_at' => now(),
                'updated_at' => now()
            ],[
                'key' => 'our_client_banner',
                'value' => '16294455029449_startup.svg',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
