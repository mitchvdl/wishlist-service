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
class Wishlist extends Model
{
    use SoftDeletes, GeneratesUuid;

    protected $table = 'wishlists';
    public $timestamps = true;
    protected $primaryKey = 'uuid';
    public $incrementing = false;

    protected $fillable = ['name', 'description'];


    protected $casts = [
        'uuid' => EfficientUuid::class,
    ];

    public function items()
    {
       return $this->hasMany(WishlistItem::class, 'wishlist_uuid', 'uuid');
    }


}
