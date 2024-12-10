@extends('master')
@section('title','register')
@section('title')
    <style>
        @keyframes gradientBackground {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
    </style>
@endsection
@section('stylebody','h-screen bg-gradient-to-br from-purple-500 to-blue-500 animate-[gradientBackground_6s_infinite] bg-[length:200%_200%]')
@section('content')
    <div class="flex items-center justify-center h-[calc(100vh-4rem)]">
        <div class="w-full max-w-md bg-white rounded-lg shadow-lg p-8 relative">
            <div class="absolute top-[-40px] left-1/2 transform -translate-x-1/2 flex items-center justify-center">
                <div class="w-20 h-20 bg-gradient-to-r from-blue-400 to-purple-600 rounded-full animate-bounce flex items-center justify-center">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRPoKRpdnIQG2_UHaZ-CFBy8Gzj3wmuE3bKoQ&s" alt="Logo" class="w-12 h-12 rounded-full shadow-md">
                </div>
            </div>
            <h2 class="text-2xl font-bold text-gray-700 text-center mb-6">Create an Account</h2>
            <p class="text-gray-500 text-center mb-8">Join us by filling the form below</p>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="mb-4">
                    <label for="name" class="block text-gray-700 font-medium">Full Name</label>
                    <input type="text" id="name" name="name" placeholder="Your Full Name" class="w-full px-4 py-2 mt-2 bg-gray-100 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500">
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-gray-700 font-medium">Email Address</label>
                    <input type="email" id="email" name="email" placeholder="example@mail.com" class="w-full px-4 py-2 mt-2 bg-gray-100 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500">
                </div>
                <div class="mb-4">
                    <label for="password" class="block text-gray-700 font-medium">Password</label>
                    <input type="password" id="password" name="password" placeholder="Create a password" class="w-full px-4 py-2 mt-2 bg-gray-100 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500">
                </div>
                <div class="flex items-center justify-between">
                    <a href="/login" class="text-sm text-purple-500 hover:underline">Or Login?</a>
                </div>
                <button type="submit" class="w-full mt-4 bg-gradient-to-r from-purple-500 to-blue-500 text-white py-2 rounded-md hover:from-purple-600 hover:to-blue-600 focus:outline-none focus:ring-4 focus:ring-purple-300">Register</button>
            </form>
        </div>
    </div>

@endsection
