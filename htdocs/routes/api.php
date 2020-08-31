<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/', function () {
    return date('c');
});

JsonApi::register('default')
    ->routes(function ($api) {
        $api->resource('wishlists', [
            'has-many' => 'items'
        ])->relationships(function ($relations) {
            $relations->hasMany('wishlist_items');
        });

        $api->resource('wishlist_items');
    });




Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
