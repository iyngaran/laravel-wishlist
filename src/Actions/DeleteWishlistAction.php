<?php


namespace Iyngaran\LaravelWishlist\Actions;

use Iyngaran\LaravelWishlist\Exceptions\WishlistNotFoundException;
use Iyngaran\LaravelWishlist\Models\Wishlist;

class DeleteWishlistAction
{
    public function execute(int $id): bool
    {
        $wishlist = Wishlist::find($id);

        if (!$wishlist) {
            throw new WishlistNotFoundException("The wishlist id # " . $id . " not found");
        }
        return $wishlist->delete();
    }
}
