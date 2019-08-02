<?php

namespace App\Http\Controllers\Admin;

use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::latest('updated_at')->get();
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        return view('admin.products.create');
    }

    public function store(Request $request)
    {
        $data = $this->validateProduct();

        $data['image'] = $this->processImage('image', $data['title']);

        Product::create($data);

        return redirect(route('admin-list-products'));
    }

    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    public function update(Product $product)
    {
        $data = $this->validateProduct($needImage = false);

        $product->update($data);

        return redirect(route('admin-list-products'));
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect(route('admin-list-products'));
    }

    //    Save and resize image
    protected function processImage($imageKey, $imageName){
        $imagePath = request()->file($imageKey)->storeAs('products', Str::slug($imageName));
        Image::make(public_path('/storage/') . $imagePath)->fit(300, 300)->save();
        return $imagePath;
    }

    protected function validateProduct($needImage = true){
        $data = request()->validate([
            'title' => 'required|unique:products',
            'description' => 'required',
            'price' => 'required|integer',
            'image' => 'image'
        ]);
        return $needImage ? $data : Arr::except($data, 'image');
    }
}
