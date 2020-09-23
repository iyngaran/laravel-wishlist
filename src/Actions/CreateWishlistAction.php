<?php


namespace Iyngaran\LaravelWishlist\Actions;


use Iyngaran\LaravelWishlist\Models\Wishlist;

class CreateWishlistAction
{
    public function execute(array $attributes): Wishlist
    {
        $wishlistableType = config('iyngaran.wishlist.wishlistable_type');

        return Wishlist::create(
            [
                'user_id' => $attributes['user_id'],
                'wishlistable_id' => $attributes['wishlistable_id'],
                'wishlistable_type' => $wishlistableType
            ]
        );
    }
}
