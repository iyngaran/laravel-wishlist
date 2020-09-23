<?php


namespace Iyngaran\LaravelWishlist\Models;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo($this->getUserModel(), "user_id");
    }


    private function getUserModel()
    {
        return config('iyngaran.wishlist.user_model');
    }

    public function getTable()
    {
        return config('iyngaran.wishlist.wishlist_table_name');
    }

    private function getWishlistableModel()
    {
        return config('iyngaran.wishlist.wishlistable_type');
    }
}
