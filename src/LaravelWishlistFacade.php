<?php

namespace Iyngaran\LaravelWishlist;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Iyngaran\LaravelWishlist\Skeleton\SkeletonClass
 */
class LaravelWishlistFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'laravel-wishlist';
    }
}
