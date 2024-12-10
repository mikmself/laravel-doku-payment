@include('sweetalert::alert')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Store</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100" >
<header class="bg-gray-800 p-4 text-white sticky top-0 z-50 shadow-lg">
    <div class="container mx-auto flex justify-between items-center">
        <a href="/" class="flex items-center space-x-2">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRPoKRpdnIQG2_UHaZ-CFBy8Gzj3wmuE3bKoQ&s" alt="Logo" class="w-12 h-12 rounded-full shadow-md">
            <span class="text-3xl font-extrabold tracking-widest hover:text-pink-300">Ataka Furniture</span>
        </a>
        <nav class="flex items-center space-x-6">
            <a href="#" class="text-lg font-medium hover:text-pink-400 transition">Home</a>
            <a href="{{ route('products') }}" class="text-lg font-medium hover:text-pink-400 transition">Produk</a>
            <a href="{{ route('index') }}/#about-us" class="text-lg font-medium hover:text-pink-400 transition">About</a>
        </nav>
        <div class="flex space-x-4">
            @auth
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-500 focus:outline-none focus:ring-2 focus:ring-red-300 transition">Logout</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="bg-gray-700 text-white px-4 py-2 rounded hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-purple-300 transition">Login</a>
                <a href="{{ route('register') }}" class="bg-white text-black px-4 py-2 rounded hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-purple-300 transition">Register</a>
            @endauth
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
                            <a href="{{ route('checkout.show', $product->id) }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Beli sekarang</a>
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
