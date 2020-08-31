<?php

namespace App\JsonApi\V1\WishlistItems;

use Neomerx\JsonApi\Schema\SchemaProvider;

class Schema extends SchemaProvider
{

    /**
     * @var string
     */
    protected $resourceType = 'wishlist_items';

    /**
     * @param \App\Models\WishlistItem $resource
     *      the domain record being serialized.
     * @return string
     */
    public function getId($resource)
    {
        return (string) $resource->getRouteKey();
    }

    /**
     * @param \App\Models\WishlistItem $resource
     *      the domain record being serialized.
     * @return array
     */
    public function getAttributes($resource)
    {
        return [
            'title' => $resource->title,
            'image_url' => $resource->image_url,
            'asin' => $resource->asin,

            'qty' => (int) $resource->qty,
            'base_price' => [
                'currency' => strtoupper($resource->currency),
                'amount' => (float) $resource->amount,
            ],

            'created_at' => $resource->created_at ? $resource->created_at->toAtomString() : null,
            'updated_at' => $resource->updated_at ? $resource->updated_at->toAtomString() : null,
        ];
    }
}
