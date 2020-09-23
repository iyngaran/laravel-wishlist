<?php
/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(
    \Iyngaran\LaravelWishlist\Tests\Models\Product::class,
    function (Faker $faker) {
        return [
            'name' => $faker->name
        ];
    }
);
