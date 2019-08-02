<?php

namespace App\Http\Controllers\Admin;

use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        return view('admin.products.create');
    }

    public function store(Request $request)
    {
        $data = request()->validate([
            'title' => 'required|unique:products',
            'description' => 'required',
            'price' => 'required|integer',
            'image' => 'image'
        ]);

        $data['image'] = $this->processImage('image', $data['title']);

        Product::create($data);

        return back();
    }

    //    Save and resize image
    protected function processImage($imageKey, $imageName){
        $imagePath = request()->file($imageKey)->storeAs('products', Str::slug($imageName));
        Image::make(public_path('/storage/') . $imagePath)->fit(300, 300)->save();
        return $imagePath;
    }
}
