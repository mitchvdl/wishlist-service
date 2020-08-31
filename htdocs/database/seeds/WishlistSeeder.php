<?php

use Illuminate\Database\Seeder;

class WishlistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\Wishlist::class, 10)->create()->each(function (\App\Models\Wishlist $wishlist) {
            $wishlist->items()->saveMany(factory(\App\Models\WishlistItem::class, rand(1,100))->create());
        });
    }
}
