<?php


namespace Iyngaran\LaravelWishlist\Tests\Unit;


use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Iyngaran\LaravelWishlist\Actions\CreateWishlistAction;
use Iyngaran\LaravelWishlist\Models\Wishlist;
use Iyngaran\LaravelWishlist\Repositories\WishlistRepositoryInterface;
use Iyngaran\LaravelWishlist\Tests\TestCase;

class WishlistRepositoryTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function get_a_wishlist_by_id()
    {
        $factWishlist = factory(Wishlist::class)->create();
        $wishlistRepository = $this->app->make(WishlistRepositoryInterface::class);
        $wishlist =  $wishlistRepository->find($factWishlist->id);

        $this->assertInstanceOf(Wishlist::class, $wishlist);
        $this->assertEquals($factWishlist->user_id, $wishlist->user_id);
        $this->assertEquals($factWishlist->wishlistable_id, $wishlist->wishlistable_id);
    }

    /** @test */
    public function get_wishlist_by_user_id()
    {
        $factWishlist = factory(Wishlist::class, 5)->create();
        $userId = $factWishlist[2]->user_id;
        $wishlistRepository = $this->app->make(WishlistRepositoryInterface::class);
        $wishlists =  $wishlistRepository->getByUserId($userId);
        $this->assertInstanceOf(Collection::class, $wishlists);
    }
}
