<?php


namespace Iyngaran\LaravelWishlist\Tests\Unit;


use Illuminate\Foundation\Testing\RefreshDatabase;
use Iyngaran\LaravelWishlist\Actions\CreateWishlistAction;
use Iyngaran\LaravelWishlist\Models\Wishlist;
use Iyngaran\LaravelWishlist\Tests\TestCase;

class CreateWishlistActionTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function create_a_wishlist()
    {
        $product = factory(\Iyngaran\LaravelWishlist\Tests\Models\Product::class)->create();
        $user = factory(\Iyngaran\LaravelWishlist\Tests\Models\User::class)->create();
        $wishlist = (new CreateWishlistAction())->execute(
            [
                'user_id' => $user->id,
                'wishlistable_id' => $product->id,

            ]
        );

        $this->assertInstanceOf(Wishlist::class, $wishlist);
        $this->assertEquals(1, Wishlist::count());
        $this->assertEquals($user->id, $wishlist->user_id);
        $this->assertEquals($product->id, $wishlist->wishlistable_id);
    }
}
