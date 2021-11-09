<?php

use Illuminate\Database\Seeder;
use App\Model\Category;
use App\Model\Product;
use Illuminate\Support\Str;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = Category::select('id', 'title')->whereNotIn('parent_id', [0])->get();
        $birthdayCakes = ['White Forests', 'Black Forests'];
        $dairy = ['Cow Milk', 'Goat Milk'];
        $bakery = ['White Bread', 'Brown Bread'];


        foreach ($categories as $category) {
            if ($category->title == 'Birthday Cakes') {
                foreach ($birthdayCakes as $value) {
                    Product::create([
                        'user_id' => 1,
                        'category_id' => $category->id,
                        'title' => $value,
                        'slug' => Str::slug($value),
                        'quantity' => 3,
                        'new_price' => rand(100, 1000),
                        'short_desc' => 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.',
                        'long_desc' => 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.'
                    ]);
                }
            }

            if ($category->title == 'Dairy') {
                foreach ($dairy as $value) {
                    Product::create([
                        'user_id' => 1,
                        'category_id' => $category->id,
                        'title' => $value,
                        'slug' => Str::slug($value),
                        'quantity' => 3,
                        'new_price' => rand(100, 1000),
                        'short_desc' => 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.',
                        'long_desc' => 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.'
                    ]);
                }
            }

            if ($category->title == 'Bakery & Confectionary') {
                foreach ($bakery as $value) {
                    Product::create([
                        'user_id' => 1,
                        'category_id' => $category->id,
                        'title' => $value,
                        'slug' => Str::slug($value),
                        'quantity' => 3,
                        'new_price' => rand(100, 1000),
                        'short_desc' => 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.',
                        'long_desc' => 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.'
                    ]);
                }
            }
        }
    }
}
