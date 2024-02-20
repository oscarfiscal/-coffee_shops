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
        // Crear algunos datos de prueba
        Product::factory()->count(10)->create();

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
}
