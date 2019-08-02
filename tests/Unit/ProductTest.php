<?php

namespace Tests\Unit;

use App\Product;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductTest extends TestCase
{
    use RefreshDatabase;

    /** @test * */
    function returns_formatted_price()
    {
        $product = factory(Product::class)->create(['price' => 2500]);

        $this->assertEquals(25.00, $product->price);
    }

    /** @test * */
    function can_return_own_path()
    {
        $product = factory(Product::class)->create();

        $this->assertEquals("products/{$product->id}", $product->path());
    }
}
