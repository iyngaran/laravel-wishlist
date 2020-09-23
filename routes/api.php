<?php
Route::post('wishlist', 'WishlistController@store');
Route::delete('wishlist/{id}', 'WishlistController@destroy');
Route::delete('wishlist/{user_id}', 'WishlistController@index');
