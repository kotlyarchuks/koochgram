@extends('layouts.app')

@section('content')
    <div class="profile text-maintext flex pt-8 mb-12">
        <div class="profile__image w-1/3 flex justify-center">
            <img src="https://picsum.photos/200" alt="" class="rounded-full">
        </div>
        <div class="profile__info w-2/3">
            <div class="flex items-center mb-4">
                <h2 class="profile__name text-2xl mr-5">Kotlyarchuk</h2>
                <button type="button" class="button">Follow</button>
            </div>
            <div class="flex mb-4">
                <span class="profile__posts mr-8"><span class="font-bold">192</span> posts</span>
                <span class="profile__followers mr-8"><span class="font-bold">27.2</span> followers</span>
                <span class="profile__following mr-8"><span class="font-bold">225</span> following</span>
            </div>
            <div class="profile__description">
                <span class="font-bold">Kotlyarchuk</span>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae consectetur corporis, dignissimos
                    dolorem ea, eos eum illo, illum ipsum magnam perferendis qui quia recusandae. Architecto corporis,
                    dolor eveniet ex iure labore laudantium, nam neque nihil non nostrum possimus rerum similique sint
                    sunt temporibus voluptas! Aperiam cum debitis ipsum odio officiis?</p>
            </div>
        </div>
    </div>
    <div class="image-grid flex flex-wrap -mx-2">
        @foreach($products as $product)
            <div class="product_card w-1/4 p-3 text-center">
                <a href="{{ $product->path() }}">
                    <img src="{{ $product->image }}" alt="" class="pb-2">
                    <h4>{{ $product->title }}</h4>
                    <div> {{ $product->price }}</div>
                </a>
            </div>

        @endforeach
    </div>
@endsection