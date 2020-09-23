<?php
/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(
    \Iyngaran\LaravelWishlist\Models\Wishlist::class,
    function (Faker $faker) {
        $product = factory(\Iyngaran\LaravelWishlist\Tests\Models\Product::class)->create();
        return [
            'user_id' => factory(\Iyngaran\LaravelWishlist\Tests\Models\User::class),
            'wishlistable_id' => $product->id,
            'wishlistable_type' => get_class($product)
        ];
    }
);
