<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Store</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100" >
<header class="bg-gray-800 p-4 text-white">
    <div class="container mx-auto flex flex-wrap justify-between items-center">
        <a href="/" class="flex items-center text-white">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRPoKRpdnIQG2_UHaZ-CFBy8Gzj3wmuE3bKoQ&s" alt="Logo" class="w-12 h-12 mr-2 rounded-full">
            <span class="text-2xl font-semibold">Ataka Furniture</span>
        </a>
        <nav class="flex space-x-4">
            <a href="/" class="text-white hover:text-gray-400">Home</a>
            <a href="{{ route('products') }}" class="text-white hover:text-gray-400">Produk</a>
            <a href="{{ route('index') }}/#about-us" class="text-white hover:text-gray-400">About</a>
        </nav>
        <div class="flex items-center space-x-4">
            @if(Auth::check())
                <span>{{ Auth::user()->name }}</span>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="text-white hover:text-gray-400">Logout</button>
                </form>
            @else
                <a href="/loginuser" class="bg-gray-700 text-white px-4 py-2 rounded hover:bg-gray-600">Login</a>
                <a href="/registrasi" class="bg-white text-black px-4 py-2 rounded hover:bg-gray-100">Sign-up</a>
            @endif
        </div>
    </div>
</header>
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
                            <a href="" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Beli sekarang</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p class="text-gray-600 text-center">Produk belum tersedia.</p>
    @endif
</div>
<footer class="bg-gray-800 text-white py-4">
    <div class="container mx-auto text-center">
        <p>&copy; 2024 Ataka Furniture. All rights reserved.</p>
    </div>
</footer>
</body>
</html>
