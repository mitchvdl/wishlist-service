<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWishlistItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wishlist_items', function (Blueprint $table) {
            $table->uuid('uuid')->primary();

            $table->uuid('wishlist_uuid')->index();

            $table->string('asin', 100)->comment('article number / sku');
            $table->string('title', 120);
            $table->string('image_url', 120)->nullable();

            $table->char('currency', 3)->default('EUR');
            $table->decimal('amount', 14,8)->default(0);
            $table->integer('qty')->default(1);

            $table->json('meta')->nullable(); // any key-value pair

            $table->foreign('wishlist_uuid')->on('wishlists')->references('uuid');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wishlist_items');
    }
}
