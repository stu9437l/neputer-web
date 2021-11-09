<?php

use Illuminate\Database\Seeder;
use App\Model\Category;
use App\Model\Product;
use Illuminate\Support\Str;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $parentCategories = ['Bakery Cakes & Dairy', 'Fresh Vegetables', 'Groceries & Staples'];
        $bakeryCakesDairy = ['Birthday Cakes', 'Dairy', 'Bakery & Confectionary'];
        $freshVegetables = ['Seasonal Vegetables', 'Leaf & Herbs', 'Ready to cook & eat'];
        $groceries = ['Rice Products', 'Lentils & Pulses', 'Aata & Suji'];
        foreach ($parentCategories as $category) {
            $parentCategory = Category::create([
                'parent_id' => 0,
                'title' => $category,
                'slug' => Str::slug($category),
                'description' => 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore.',
                'status' => 1,
                'pcount' => 0,
            ]);

            if ($parentCategory->title == 'Bakery Cakes & Dairy') {
                foreach ($bakeryCakesDairy as $value) {
                    $category = Category::create([
                        'parent_id' => $parentCategory->id,
                        'title' => $value,
                        'slug' => Str::slug($value),
                        'description' => 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore.',
                        'status' => 1,
                        'pcount' => 0,
                    ]);
                }

            }

            if ($parentCategory->title == 'Fresh Vegetables') {
                foreach ($freshVegetables as $value) {
                    $category = Category::create([
                        'parent_id' => $parentCategory->id,
                        'title' => $value,
                        'slug' => Str::slug($value),
                        'description' => 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore.',
                        'status' => 1,
                        'pcount' => 0,
                    ]);
                }
            }

            if ($parentCategory->title == 'Groceries & Staples') {
                foreach ($groceries as $value) {
                    Category::create([
                        'parent_id' => $parentCategory->id,
                        'title' => $value,
                        'slug' => Str::slug($value),
                        'description' => 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore.',
                        'status' => 1,
                        'pcount' => 0,
                    ]);
                }
            }

        }

    }
}
