<?php


namespace Iyngaran\LaravelWishlist\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Wishlist extends JsonResource
{
    public function toArray($request)
    {
        $wishlistable = config('iyngaran.wishlist.wishlistable_type');
        return [
            'data' => [
                'type' => 'wishlists',
                'wishlist_id' => $this->id,
                'attributes' => [
                    'id' => $this->id,
                    'user_id' => $this->user_id,
                    'wishlist_item' => $wishlistable::find($this->wishlistable_id),
                    'created_at' => $this->created_at,
                    'updated_at' => $this->updated_at
                ]
            ],
            'links' => [
                'self' => url("api/wishlists/" . $this->id),
            ]
        ];
    }
}
