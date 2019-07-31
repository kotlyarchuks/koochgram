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
        $this->withoutExceptionHandling();
        $attributes = factory(Product::class)
            ->raw([
                'image' => new UploadedFile(resource_path('test-files/Denis.jpg'),
                    'Denis.jpg', null, null, null, true)]);

        $this->post('/products', $attributes);
        $this->assertDatabaseHas('products', Arr::except($attributes, 'image'));
    }
}
