<?php


namespace Iyngaran\LaravelWishlist\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WishlistRequest extends FormRequest
{
    public function rules()
    {
        return [
            'wishlistable_id' => 'required'
        ];
    }


    public function messages()
    {
        return [
            'wishlistable_id.required' => 'The wishlistable is required'
        ];
    }
}
