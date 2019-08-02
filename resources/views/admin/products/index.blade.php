@extends('admin.app')

@section('content')
    <h2 class="text-2xl mb-4">Products</h2>
    <div class="bg-gray-100">
        <div>
            <a href="{{ route('create-product') }}" class="button mb-4" type="button">Add product</a>
        </div>
        <div>
            <table class="bg-white shadow-md rounded">
                <tr>
                    <th class="py-4 px-6 bg-gray-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Title</th>
                    <th class="py-4 px-6 bg-gray-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Price</th>
                </tr>

                @foreach($products as $product)
                    <tr class="">
                        <td class="py-4 px-6 border-b border-grey-light">{{ $product->title }}</td>
                        <td class="py-4 px-6 border-b border-grey-light">{{ $product->price }}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection