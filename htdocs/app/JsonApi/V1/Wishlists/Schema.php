<?php

namespace App\JsonApi\V1\Wishlists;

use App\Models\Wishlist;
use Neomerx\JsonApi\Schema\SchemaProvider;

class Schema extends SchemaProvider
{

    /**
     * @var string
     */
    protected $resourceType = 'wishlists';

    /**
     * @param \App\Models\Wishlist $resource
     *      the domain record being serialized.
     * @return string
     */
    public function getId($resource)
    {
        return (string) $resource->getRouteKey();
    }
    public function getRelationships($wishlist, $isPrimary, array $includeRelationships)
    {
        return [
            'items' => [
                self::SHOW_SELF => true,
                self::SHOW_RELATED => true,
                self::DATA => function () use ($wishlist) {
                    return $wishlist->items;
                },
            ],
        ];
    }

    /**
     * @param \App\Models\Wishlist $resource
     *      the domain record being serialized.
     * @return array
     */
    public function getAttributes($resource)
    {
        return [
            'name' => (string) $resource->name,
            'description' => (string) $resource->description,

            'sharing_code' => (string) $resource->sharing_code,
            'items' => (int) 0,

            'created_at' => $resource->created_at ? $resource->created_at->toAtomString() : null,
            'updated_at' => $resource->updated_at ? $resource->updated_at->toAtomString() : null,
        ];
    }
}
