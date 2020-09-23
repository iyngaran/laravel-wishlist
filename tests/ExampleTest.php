<?php

namespace Iyngaran\LaravelWishlist\Tests;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Iyngaran\LaravelWishlist\LaravelWishlistServiceProvider;
use Iyngaran\LaravelWishlist\Models\Wishlist;

class ExampleTest extends TestCase
{

    use RefreshDatabase;

    /** @test */
    public function true_is_true()
    {
        $wishlist = factory(Wishlist::class)->create();
        $this->assertTrue(true);
    }
}
