@extends('layouts.app')

@section('content')
    <div class="flex w-1/2 mx-auto pt-8">
        <div class="w-1/2">
            <img src="{{ $product->image }}" alt="">
        </div>
        <div class="w-1/2">
            <h2>{{ $product->title }}</h2>
            <div> {{ $product->price }}</div>
            <div> {{ $product->description }} </div>
        </div>
    </div>
@endsection