@include('sweetalert::alert')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @keyframes gradientBackground {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
    </style>
</head>
<body class="h-screen bg-gradient-to-br from-purple-500 to-blue-500 animate-[gradientBackground_6s_infinite] bg-[length:200%_200%]">
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
<div class="flex items-center justify-center h-[calc(100vh-4rem)]">
    <div class="w-full max-w-md bg-white rounded-lg shadow-lg p-8 relative">
        <div class="absolute top-[-40px] left-1/2 transform -translate-x-1/2 flex items-center justify-center">
            <div class="w-20 h-20 bg-gradient-to-r from-blue-400 to-purple-600 rounded-full animate-bounce flex items-center justify-center">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRPoKRpdnIQG2_UHaZ-CFBy8Gzj3wmuE3bKoQ&s" alt="Logo" class="w-12 h-12 rounded-full shadow-md">
            </div>
        </div>
        <h2 class="text-2xl font-bold text-gray-700 text-center mb-6">Welcome Back</h2>
        <p class="text-gray-500 text-center mb-8">Please login to your account</p>
        <form method="post" action="{{ route('login') }}">
            @csrf
            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-medium">Email Address</label>
                <input type="email" id="email" name="email" placeholder="example@mail.com" class="w-full px-4 py-2 mt-2 bg-gray-100 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500">
            </div>
            <div class="mb-6">
                <label for="password" class="block text-gray-700 font-medium">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" class="w-full px-4 py-2 mt-2 bg-gray-100 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500">
            </div>
            <div class="flex items-center justify-between">
                <a href="/register" class="text-sm text-purple-500 hover:underline">Or Register?</a>
            </div>
            <button type="submit" class="w-full mt-4 bg-gradient-to-r from-purple-500 to-blue-500 text-white py-2 rounded-md hover:from-purple-600 hover:to-blue-600 focus:outline-none focus:ring-4 focus:ring-purple-300">Login</button>
        </form>
    </div>
</div>
</body>
</html>
