<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    public function store(Request $request)
    {
        $data = request()->validate([
            'title' => 'required|unique:products',
            'description' => 'required',
            'price' => 'required|integer',
            'image' => 'image'
        ]);

        $data['image'] = request()->file('image')->store('products');

        Product::create($data);

        return back();
    }
}
