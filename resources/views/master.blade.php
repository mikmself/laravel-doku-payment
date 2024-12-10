<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    @yield('style')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="@yield('stylebody','bg-gray-100')">
<header class="bg-gray-800 p-4 text-white sticky top-0 z-50 shadow-lg">
    <div class="container mx-auto flex justify-between items-center">
        <a href="{{route('index')}}" class="flex items-center space-x-2">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRPoKRpdnIQG2_UHaZ-CFBy8Gzj3wmuE3bKoQ&s" alt="Logo" class="w-12 h-12 rounded-full shadow-md">
            <span class="text-3xl font-extrabold tracking-widest hover:text-pink-300">Ataka Furniture</span>
        </a>
        <nav class="flex items-center space-x-6">
            <a href="{{route('index')}}" class="text-lg font-medium hover:text-pink-400 transition">Home</a>
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
@yield('content')
<footer class="bg-gray-800 text-white py-4">
    <div class="container mx-auto text-center">
        <p>&copy; 2024 Ataka Furniture. All rights reserved.</p>
    </div>
</footer>
@yield('script')
<script>
    @if (session('success'))
    Swal.fire({
        icon: 'success',
        title: 'Success!',
        text: "{{ session('success') }}",
    });
    @elseif (session('warning'))
    Swal.fire({
        icon: 'warning',
        title: 'Warning!',
        text: "{{ session('warning') }}",
    });
    @elseif (session('error'))
    Swal.fire({
        icon: 'error',
        title: 'Error!',
        text: "{{ session('error') }}",
    });
    @endif
</script>
</body>
</html>
