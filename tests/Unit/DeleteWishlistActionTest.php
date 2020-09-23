<?php


namespace Iyngaran\LaravelWishlist\Tests\Unit;


use Illuminate\Foundation\Testing\RefreshDatabase;
use Iyngaran\LaravelWishlist\Actions\DeleteWishlistAction;
use Iyngaran\LaravelWishlist\Models\Wishlist;
use Iyngaran\LaravelWishlist\Tests\TestCase;

class DeleteWishlistActionTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function create_a_wishlist()
    {
        $wishlist = factory(Wishlist::class)->create();
        $deleted = (new DeleteWishlistAction())->execute($wishlist->id);

        $this->assertTrue($deleted);
        $this->assertEquals(0, Wishlist::count());
    }
}
