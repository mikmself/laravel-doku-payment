@include('sweetalert::alert')
    <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
<header class="bg-gray-800 p-4 text-white sticky top-0 z-50 shadow-lg">
    <div class="container mx-auto flex justify-between items-center">
        <a href="/" class="flex items-center space-x-2">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRPoKRpdnIQG2_UHaZ-CFBy8Gzj3wmuE3bKoQ&s" alt="Logo"
                 class="w-12 h-12 rounded-full shadow-md">
            <span class="text-3xl font-extrabold tracking-widest hover:text-pink-300">Ataka Furniture</span>
        </a>
    </div>
</header>

<div class="container mx-auto px-4 py-8" style="min-height: 85vh;">
    <h2 class="text-2xl font-bold mb-6 text-gray-800">Checkout</h2>

    <!-- Produk yang dipilih -->
    <div class="bg-white shadow-md rounded-lg p-6 mb-6">
        <h3 class="text-lg font-bold mb-4">Produk yang Anda Pilih</h3>
        <div class="flex items-center mb-4">
            <img src="{{ $product->image }}" alt="{{ $product->name }}" class="w-24 h-24 object-cover mr-4">
            <div>
                <h4 class="text-lg font-semibold">{{ $product->name }}</h4>
                <p class="text-gray-600">{{ $product->description }}</p>
                <p class="text-blue-600 font-bold">Rp{{ number_format($product->price, 0, ',', '.') }}</p>
            </div>
        </div>
    </div>

    <!-- Form Checkout -->
    <form method="POST" action="{{ route('checkout.process') }}">
        @csrf
        <div class="bg-white shadow-md rounded-lg p-6 mb-6">
            <h3 class="text-lg font-bold mb-4">Informasi Pengiriman</h3>
            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-medium">Nama Lengkap</label>
                <input type="text" name="name" id="name" class="w-full px-4 py-2 mt-2 bg-gray-100 border border-gray-300 rounded-md"
                       required>
            </div>
            <div class="mb-4">
                <label for="address" class="block text-gray-700 font-medium">Alamat Pengiriman</label>
                <textarea name="address" id="address" class="w-full px-4 py-2 mt-2 bg-gray-100 border border-gray-300 rounded-md" rows="4" required></textarea>
            </div>
            <div class="mb-4">
                <label for="phone" class="block text-gray-700 font-medium">Nomor Telepon</label>
                <input type="text" name="phone" id="phone" class="w-full px-4 py-2 mt-2 bg-gray-100 border border-gray-300 rounded-md"
                       required>
            </div>
        </div>

        <!-- Metode Pembayaran -->
        <div class="bg-white shadow-md rounded-lg p-6 mb-6">
            <h3 class="text-lg font-bold mb-4">Pilih Metode Pembayaran</h3>
            <div class="mb-4">
                <select name="payment_method" id="payment_method" class="w-full px-4 py-2 mt-2 bg-gray-100 border border-gray-300 rounded-md">
                    <option value="credit_card">Kartu Kredit</option>
                    <option value="bank_transfer">Transfer Bank</option>
                </select>
            </div>
        </div>

        <!-- Total Harga -->
        <div class="bg-white shadow-md rounded-lg p-6 mb-6">
            <h3 class="text-lg font-bold mb-4">Rincian Pembayaran</h3>
            <div class="flex justify-between items-center mb-4">
                <span class="font-medium">Total Harga</span>
                <span class="font-bold text-blue-600">Rp{{ number_format($product->price, 0, ',', '.') }}</span>
            </div>
        </div>

        <button type="submit" class="w-full bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">Proses Pembayaran</button>
    </form>
</div>

<footer class="bg-gray-800 text-white py-4">
    <div class="container mx-auto text-center">
        <p>&copy; 2024 Ataka Furniture. All rights reserved.</p>
    </div>
</footer>
</body>

</html>
