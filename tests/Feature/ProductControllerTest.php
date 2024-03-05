<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Product;

class ProductControllerTest extends TestCase
{

    /**
     * Test for index method.
     */
    public function testIndex()
    {

        $response = $this->get(route('products.index'));

        $response->assertStatus(200);

        $response->assertViewIs('products.index');

        $response->assertViewHas('products');
    }

    /**
     * Test for create method.
     */
    public function testCreate()
    {
        $response = $this->get(route('products.create'));
        $response->assertStatus(200);
        $response->assertViewIs('products.create');
    }

    public function test_it_deletes_a_product()
    {
        $this->withoutMiddleware();
        $product = Product::factory()->create();

        $this->assertDatabaseHas('products', [
            'id' => $product->id,
        ]);

        $response = $this->delete(route('products.destroy', $product));

        $response->assertRedirect(route('products.index'));
    }

    
}
