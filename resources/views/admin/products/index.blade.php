@extends('admin.app')

@section('content')
    <h2 class="text-2xl mb-4">Products</h2>
    <div class="bg-gray-100">
        <div>
            <a href="{{ route('create-product') }}" class="button mb-4" type="button">Add product</a>
        </div>
        <div class="w-1/2">
            <table class="w-full bg-white shadow-md rounded">
                <tr class="text-left">
                    <th class="py-4 px-6 bg-gray-lightest font-bold uppercase text-sm text-grey-dark border-b border-r border-grey-light">Title</th>
                    <th class="py-4 px-6 bg-gray-lightest font-bold uppercase text-sm text-grey-dark border-b border-r border-grey-light">Price</th>
                    <th class="py-4 px-6 bg-gray-lightest font-bold uppercase text-sm text-grey-dark border-b border-r border-grey-light">Created</th>
                    <th class="py-4 px-6 bg-gray-lightest font-bold uppercase text-sm text-grey-dark border-b border-r border-grey-light">Updated</th>
                    <th class="py-4 px-6 bg-gray-lightest font-bold uppercase text-sm text-grey-dark border-b border-r border-grey-light"></th>
                </tr>

                @foreach($products as $product)
                    <tr class="">
                        <td class="py-4 px-6 border-b border-r border-grey-light hover:text-gray-600">
                            <a href="/admin/{{ $product->path() }}/edit">
                                {{ $product->title }}
                            </a>
                        </td>
                        <td class="py-4 px-6 border-b border-r border-grey-light">{{ $product->price }}</td>
                        <td class="py-4 px-6 border-b border-r border-grey-light">{{ $product->created_at->diffForHumans() }}</td>
                        <td class="py-4 px-6 border-b border-r border-grey-light">{{ $product->updated_at->diffForHumans() }}</td>
                        <td class="py-4 px-6 border-b border-r border-grey-light text-center">
                            <form action="/admin/{{ $product->path() }}" method="POST" id="deleteForm">
                                @csrf
                                @method('DELETE')
                                <button href="#" onclick="this.form.submit()" class="">
                                    <img src="https://img.icons8.com/ios-glyphs/30/e98074/trash.png" class="w-5">
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection