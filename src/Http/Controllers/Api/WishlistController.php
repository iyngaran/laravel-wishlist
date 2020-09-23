<?php


namespace Iyngaran\LaravelWishlist\Http\Controllers\Api;

use Iyngaran\LaravelWishlist\Repositories\WishlistRepositoryInterface;
use Iyngaran\LaravelWishlist\Http\Resources\WishlistCollection;
use Iyngaran\LaravelWishlist\Actions\CreateWishlistAction;
use Iyngaran\LaravelWishlist\Actions\DeleteWishlistAction;
use Iyngaran\LaravelWishlist\Http\Requests\WishlistRequest;
use Iyngaran\LaravelWishlist\Http\Resources\Wishlist;
use Iyngaran\ApiResponse\Http\Traits\ApiResponse;
use Illuminate\Http\JsonResponse;


class WishlistController
{
    use ApiResponse;

    private $wishlist;

    public function __construct(WishlistRepositoryInterface $wishlist)
    {
        $this->wishlist = $wishlist;
    }

    public function index($user_id): ?JsonResponse
    {
        return $this->responseWithCollection(
            new WishlistCollection($this->wishlist->getByUserId($user_id))
        );
    }

    public function store(WishlistRequest $request): JsonResponse
    {
        return $this->createdResponse(
            new Wishlist((new CreateWishlistAction())->execute($request))
        );
    }

    public function destroy($id): JsonResponse
    {
        return $this->deletedResponse(
            (new DeleteWishlistAction())->execute($id)
        );
    }
}
