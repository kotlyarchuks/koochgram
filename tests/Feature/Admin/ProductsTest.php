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
        $attributes = factory(Product::class)->raw(['image' => $this->generateImage()]);

        $this->post('admin/products', $attributes);
        $this->assertDatabaseHas('products', Arr::except($attributes, 'image'));
    }

    /** @test * */
    function product_can_be_updated()
    {
        $product = factory(Product::class)->create();

        $this->patch("/admin/{$product->path()}", $params = [
            'title' => 'Changed!',
            'description' => 'Updated!',
            'price' => 2000,
            'image' => $this->generateImage()
        ]);

        $this->assertDatabaseHas('products', $params);
    }

    /** @test * */
    function product_can_be_deleted()
    {
        $this->withoutExceptionHandling();
        $product = factory(Product::class)->create();

        $this->delete("/admin/{$product->path()}");

        $this->assertCount(0, Product::all());
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

    public function generateImage()
    {
        return new UploadedFile(resource_path('test-files/Denis.jpg'),
            'Denis.jpg', null, null, null, true);
    }
}
