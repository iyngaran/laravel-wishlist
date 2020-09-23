<?php
Route::post('wishlist', 'WishlistController@store');
Route::delete('wishlist/{id}', 'WishlistController@destroy');
Route::get('wishlist/{user_id}', 'WishlistController@index');
