<?php


namespace Iyngaran\LaravelWishlist\Repositories;


use Illuminate\Database\Eloquent\Collection;
use Iyngaran\LaravelWishlist\Exceptions\WishlistNotFoundException;
use Iyngaran\LaravelWishlist\Models\Wishlist;

class WishlistRepository implements WishlistRepositoryInterface
{

    public function find(int $id): ?Wishlist
    {
        $wishlist = Wishlist::find($id);
        if (!$wishlist) {
            throw new WishlistNotFoundException("The wishlist id # " . $id . " not found");
        }
        return $wishlist;
    }

    public function getByUserId(int $userId): Collection
    {
        $wishlists = Wishlist::where('user_id', $userId)->get();
        if (!$wishlists) {
            throw new WishlistNotFoundException("The wishlist not found");
        }
        return $wishlists;
    }
}
