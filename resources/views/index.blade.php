@include('sweetalert::alert')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ataka Furniture</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            scroll-behavior: smooth;
        }
        .hero-gradient {
            background: linear-gradient(135deg, #ff7eb3, #ff758c, #ff6765);
            animation: gradientShift 8s ease infinite;
        }
        @keyframes gradientShift {
            0%, 100% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
        }
        .parallax {
            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
        .fade-in {
            opacity: 0;
            transform: translateY(20px);
            animation: fadeIn 1.2s forwards;
        }
        @keyframes fadeIn {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body class="bg-gray-100">

<header class="bg-gray-800 p-4 text-white sticky top-0 z-50 shadow-lg">
    <div class="container mx-auto flex justify-between items-center">
        <a href="/" class="flex items-center space-x-2">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRPoKRpdnIQG2_UHaZ-CFBy8Gzj3wmuE3bKoQ&s" alt="Logo" class="w-12 h-12 rounded-full shadow-md">
            <span class="text-3xl font-extrabold tracking-widest hover:text-pink-300">Ataka Furniture</span>
        </a>
        <nav class="flex space-x-6">
            <a href="#" class="text-lg font-medium hover:text-pink-400 transition">Home</a>
            <a href="{{ route('products') }}" class="text-lg font-medium hover:text-pink-400 transition">Produk</a>
            <a href="{{ route('index') }}/#about-us" class="text-white hover:text-gray-400">About</a>
        </nav>
        <div class="flex space-x-4">
            <a href="{{ route('login') }}" class="bg-gray-700 text-white px-4 py-2 rounded hover:bg-gray-600">Login</a>
            <a href="{{ route('register') }}" class="bg-white text-black px-4 py-2 rounded hover:bg-gray-100">Register</a>
        </div>
    </div>
</header>

<div class="hero-gradient text-white h-screen flex flex-col items-center justify-center relative">
    <div class="text-center space-y-6">
        <h1 class="text-5xl md:text-7xl font-extrabold animate-pulse">Transform Your Space</h1>
        <p class="text-lg md:text-xl font-light max-w-3xl mx-auto" style="margin-bottom: 1cm">Discover furniture that perfectly blends elegance and comfort to elevate your home experience.</p>
        <a href="/store" class="px-8 py-3 bg-white text-pink-500 font-bold text-lg rounded-full shadow-xl hover:bg-pink-100 transition">Shop Now</a>
    </div>
    <div class="absolute bottom-8 animate-bounce">
        <a href="#carousel" class="text-2xl font-bold">↓ Explore ↓</a>
    </div>
</div>

<div id="carousel" class="relative overflow-hidden parallax bg-cover bg-center" style="background-image: url('{{ asset('assets/furniture.jpg') }}');">
    <div class="flex transition-transform duration-700" id="carousel-inner">
        <div class="min-w-full h-[600px] flex items-center justify-center text-white bg-black bg-opacity-60">
            <div class="text-center space-y-4 fade-in">
                <h2 class="text-4xl font-extrabold">Cari Furniture untuk kebutuhan Anda</h2>
                <p class="text-lg">Eksplorasi koleksi kami dan temukan inspirasi baru untuk rumah Anda.</p>
            </div>
        </div>
        <div class="min-w-full h-[600px] flex items-center justify-center text-white bg-pink-700 bg-opacity-60">
            <div class="text-center space-y-4 fade-in">
                <h2 class="text-4xl font-extrabold">Dapatkan Furniture Dengan Harga Terjangkau</h2>
                <p class="text-lg">Diskon eksklusif dan penawaran menarik menanti Anda!</p>
            </div>
        </div>
        <div class="min-w-full h-[600px] flex items-center justify-center text-white bg-gray-800 bg-opacity-60">
            <div class="text-center space-y-4 fade-in">
                <h2 class="text-4xl font-extrabold">Garansi Seumur Hidup</h2>
                <p class="text-lg">Kepercayaan Anda adalah prioritas kami.</p>
            </div>
        </div>
    </div>
    <div class="absolute bottom-6 left-1/2 transform -translate-x-1/2 flex space-x-4">
        <button class="w-4 h-4 bg-white rounded-full shadow-lg hover:bg-pink-500 transition" onclick="moveSlide(0)"></button>
        <button class="w-4 h-4 bg-white rounded-full shadow-lg hover:bg-pink-500 transition" onclick="moveSlide(1)"></button>
        <button class="w-4 h-4 bg-white rounded-full shadow-lg hover:bg-pink-500 transition" onclick="moveSlide(2)"></button>
    </div>
</div>

<section id="about-us" class="py-24 bg-gradient-to-r from-gray-100 via-white to-gray-100 text-gray-800">
    <div class="container mx-auto text-center space-y-12">
        <h2 class="text-5xl font-extrabold tracking-wide text-gray-700">About Us</h2>
        <div class="flex justify-center">
            <div class="relative group">
                <img src="{{ asset('assets/about.png') }}" alt="Gambar Tentang Kami" class="max-w-xs sm:max-w-sm lg:max-w-md rounded-lg shadow-lg transform transition duration-500 group-hover:scale-105">
                <div class="absolute inset-0 bg-black bg-opacity-30 rounded-lg opacity-0 group-hover:opacity-100 transition duration-500"></div>
            </div>
        </div>
        <p class="max-w-2xl mx-auto text-lg font-light leading-relaxed text-gray-600" style="margin-bottom: 1cm">
            Kami adalah perusahaan yang berkomitmen menghadirkan furniture terbaik untuk Anda. Produk kami dirancang dengan estetika, kualitas, dan fungsionalitas untuk menciptakan pengalaman luar biasa di setiap ruang Anda.
        </p>
        <a href="/store" class="px-6 py-3 bg-pink-500 text-white font-semibold rounded-lg shadow-lg hover:bg-pink-600 transition">
            Explore Our Products
        </a>
    </div>
</section>


<footer class="bg-gray-900 text-white py-6">
    <div class="container mx-auto text-center">
        <p>&copy; 2024 Ataka Furniture. All rights reserved.</p>
    </div>
</footer>

<script>
    let currentIndex = 0;
    const slides = document.querySelectorAll('#carousel-inner > div');
    const dots = document.querySelectorAll('footer ~ div > button');

    function moveSlide(index) {
        currentIndex = index;
        document.getElementById('carousel-inner').style.transform = `translateX(-${currentIndex * 100}%)`;
        dots.forEach((dot, i) => {
            dot.classList.toggle('bg-pink-500', i === currentIndex);
        });
    }

    setInterval(() => {
        currentIndex = (currentIndex + 1) % slides.length;
        moveSlide(currentIndex);
    }, 4000);
</script>
</body>
</html>
