@extends('master')
@section('title','products')
@section('content')
    <div class="container mx-auto px-4 py-8" id="produk" style="min-height: 85vh">
        <h2 class="text-2xl font-bold mb-6 text-gray-800">Produk Kami</h2>
        @if ($products->count() > 0)
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($products as $product)
                    <div class="bg-white shadow-md rounded-lg overflow-hidden">
                        <img src="{{ $product->image }}" alt="{{ $product->name }}" class="w-full h-48 object-contain">
                        <div class="p-4">
                            <h3 class="text-lg font-bold">{{ $product->name }}</h3>
                            <p class="text-gray-600 mt-2">{{ $product->description }}</p>
                            <div class="mt-4 flex justify-between items-center">
                                <span class="text-blue-600 font-bold">Rp{{ number_format($product->price, 0, ',', '.') }}</span>
                                <a href="{{ route('checkout.checkout-form', $product->id) }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Beli sekarang</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-gray-600 text-center">Produk belum tersedia.</p>
        @endif
    </div>
@endsection
