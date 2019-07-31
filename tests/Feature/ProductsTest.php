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
        $this->withoutExceptionHandling();

        $product1 = factory(Product::class)->create();
        $product2 = factory(Product::class)->create();

        $this->get('/')
            ->assertOk()
            ->assertSee($product1->title)
            ->assertSee($product1->price / 100)
            ->assertSee($product2->title)
            ->assertSee($product2->price / 100);
    }
}
