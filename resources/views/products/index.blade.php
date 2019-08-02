@extends('layouts.app')

@section('content')
    <div class="slider flex items-end">
        <div class="ml-16 mb-64 text-center">
            <h3 class="text-6xl font-bold text-black mb-3">I'll Tell You What</h3>
            <button class="button text-xl py-5 px-10 w-1/3 shadow-md">Buy</button>
        </div>
    </div>
    <div class="w-2/3 mx-auto">
        <h3 class="text-3xl my-10 text-center">Our Products</h3>
        <div class="image-grid flex flex-wrap -mx-2">
            @foreach($products as $product)
                <div class="product_card w-1/4 p-3 text-center">
                    <a href="{{ $product->path() }}">
                        <img src="/storage/{{ $product->image }}" alt="" class="pb-2">
                        <h4 class="text-xl mb-3">{{ $product->title }}</h4>
                        <div> {{ $product->price }}$</div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection