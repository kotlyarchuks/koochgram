@extends('layouts.app')

@section('content')
    <div class="w-1/2 mx-auto pt-8">
        <div class="mb-5">
            <a href="/products">Home</a> / {{ $product->title }}
        </div>
        <div class="flex">
            <div class="w-1/2">
                <img src="/storage/{{ $product->image }}" alt="">
            </div>
            <div class="w-1/2">
                <h2>{{ $product->title }}</h2>
                <div> {{ $product->price }}</div>
                <div> {{ $product->description }} </div>
            </div>
        </div>
    </div>
@endsection