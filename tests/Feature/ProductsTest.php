<?php

namespace Tests\Feature;

use App\Product;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductsTest extends TestCase
{
    use RefreshDatabase;

    /** @test * */
    function user_can_see_products_on_main_page()
    {
        $product1 = factory(Product::class)->create();
        $product2 = factory(Product::class)->create();

        $this->get('/products')
            ->assertOk()
            ->assertSee($product1->title)
            ->assertSee($product1->price)
            ->assertSee($product2->title)
            ->assertSee($product2->price);
    }

    /** @test * */
    function user_can_see_product_page()
    {
        $this->withoutExceptionHandling();
        $product = factory(Product::class)->create();

        $this->get($product->path())
            ->assertOk()
            ->assertSee($product->title)
            ->assertSee($product->description)
            ->assertSee($product->price);
    }
}
