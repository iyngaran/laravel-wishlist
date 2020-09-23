<?php


namespace Iyngaran\LaravelWishlist\Repositories;


use Illuminate\Database\Eloquent\Collection;
use Iyngaran\LaravelWishlist\Models\Wishlist;

interface WishlistRepositoryInterface
{
    public function find(int $id): ? Wishlist;
    public function getByUserId(int $userId): Collection;
}
