<?php

namespace App\Models;

use Dyrynda\Database\Support\GeneratesUuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Wishlist
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Wishlist newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Wishlist newQuery()
 * @method static \Illuminate\Database\Query\Builder|Wishlist onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Wishlist query()
 * @method static \Illuminate\Database\Eloquent\Builder|Wishlist whereUuid($uuid, $uuidColumn = null)
 * @method static \Illuminate\Database\Query\Builder|Wishlist withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Wishlist withoutTrashed()
 * @mixin \Eloquent
 */
class WishlistItem extends Model
{
    use SoftDeletes, GeneratesUuid;

    protected $table = 'wishlist_items';
    public $timestamps = true;
    protected $primaryKey = 'uuid';
    public $incrementing = false;

    protected $fillable = ['title', 'currency', 'amount', 'meta', 'qty', 'image_url', 'asin', 'wishlist_uuid'];


    protected $casts = [
        'uuid' => EfficientUuid::class,
        'wishlist_uuid' => EfficientUuid::class,
    ];

    public function wishlist()
    {
        return $this->belongsTo(Wishlist::class, 'uuid', 'wishlist_uuid');
    }
}
