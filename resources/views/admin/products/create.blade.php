@extends('admin.app')

@section('content')
    <h2 class="text-2xl mb-4">Add Product</h2>
    <div class="">
        <form action="/admin/products/" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4 w-1/2">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="title">
                    Title
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="title" type="text" placeholder="Title" name="title" required>
            </div>
            <div class="mb-4 w-1/2">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="description">
                    Description
                </label>
                <textarea class="shadow appearance-none rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="description" name="description" rows="5" required></textarea>
            </div>
            <div class="mb-4 w-1/2">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="price">
                    Price
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="price" type="number" placeholder="" name="price" required>
            </div>
            <div class="mb-6 w-1/2">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="price">
                    Image
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="image" type="file" placeholder="" name="image" required>
            </div>
            <div class="flex items-center">
                <button class="button mr-3" type="submit">
                    Create
                </button>
                <a class="inline-block align-baseline font-bold text-sm text-accent" href="#">
                    Cancel
                </a>
            </div>
        </form>
    </div>
@endsection