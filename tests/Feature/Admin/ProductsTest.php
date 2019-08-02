<?php

namespace Tests\Feature\Admin;

use App\Product;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Arr;
use Intervention\Image\Facades\Image;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductsTest extends TestCase
{
    use RefreshDatabase;

    /** @test * */
    function product_can_be_added()
    {
        $attributes = factory(Product::class)
            ->raw([
                'image' => new UploadedFile(resource_path('test-files/Denis.jpg'),
                    'Denis.jpg', null, null, null, true)]);

        $this->post('admin/products', $attributes);
        $this->assertDatabaseHas('products', Arr::except($attributes, 'image'));
    }

    /** @test * */
    function can_view_list_of_all_products()
    {
        $product1 = factory(Product::class)->create();
        $product2 = factory(Product::class)->create();

        $this->get('/admin/products')
            ->assertOk()
            ->assertSee($product1->title)
            ->assertSee($product2->title);
    }
}
