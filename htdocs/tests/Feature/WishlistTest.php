<?php

namespace Tests\Feature;

use Faker\Provider\Address;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class WishlistTest extends TestCase
{

    use WithFaker;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testGetWishlists()
    {
        $response = $this->get('/api/v1/wishlists');

        $response->assertStatus(200);
    }

    public function testCreateWishlistMinimalData()
    {
        $post = [];


        $name = $this->faker->name;

        $response = $this->postJson('/api/v1/wishlists', [
            'data' => [
                'type' => 'wishlists',
                'attributes' => [
                    'name' => $name,
                ]
            ]
        ]);

        $response->assertStatus(201)
            ->assertJsonPath('data.attributes.name', $name)
        ;
    }

    public function testCreateWishlistWithDescriptionData()
    {
        $post = [];


        $name = $this->faker->text(50);
        $desc = $this->faker->text(100);

        $response = $this->postJson('/api/v1/wishlists', [
            'data' => [
                'type' => 'wishlists',
                'attributes' => [
                    'name' => $name,
                    'description' => $desc,
                ]
            ]
        ]);

        $response->assertStatus(201)
            ->assertJsonPath('data.attributes.name', $name)
        ;
    }



    public function testCreateDeleteCreatedWishlist()
    {
        $post = [];


        $name = $this->faker->text(50);
        $desc = $this->faker->text(100);

        $response = $this->postJson('/api/v1/wishlists', [
            'data' => [
                'type' => 'wishlists',
                'attributes' => [
                    'name' => $name,
                    'description' => $desc,
                ]
            ]
        ]);

        $response->assertStatus(201)
            ->assertJsonPath('data.attributes.name', $name)
        ;

        $response = $this->delete(sprintf('/api/v1/wishlists/%s', $response->json('data.id')));
    }
}
