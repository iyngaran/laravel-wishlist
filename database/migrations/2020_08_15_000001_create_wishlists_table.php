<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWishlistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(config('iyngaran.wishlist.wishlist_table_name'), function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->unsigned();
            $table->unsignedBigInteger('wishlistable_id')->nullable();
            $table->unsignedBigInteger('wishlistable_type')->nullable();
            $table->timestamps();
            $table->foreign('user_id')->references(config('iyngaran.wishlist.user_table_primary_key'))
                ->on(config('iyngaran.wishlist.user_table_name'))
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(config('iyngaran.wishlist.wishlist_table_name'));
    }
}
