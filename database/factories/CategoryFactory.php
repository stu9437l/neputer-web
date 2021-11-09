<?php

use Faker\Generator as Faker;
use App\Model\Category;

$factory->define(Category::class, function (Faker $faker) {
    return [
        'parent_id' => 0,
        'title' => $faker->name,
        'slug' => $faker->slug,
        'description' => $faker->sentence(),
        'status' => rand(0, 1),
    ];
});
