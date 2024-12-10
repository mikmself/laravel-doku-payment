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
<body class="h-screen bg-gradient-to-br from-purple-500 to-blue-500 animate-[gradientBackground_6s_infinite] bg-[length:200%_200%] flex items-center justify-center">
<div class="w-full max-w-md bg-white rounded-lg shadow-lg p-8 relative">
    <div class="absolute top-[-40px] left-1/2 transform -translate-x-1/2">
        <div class="w-20 h-20 bg-gradient-to-r from-blue-400 to-purple-600 rounded-full animate-bounce"></div>
    </div>
    <h2 class="text-2xl font-bold text-gray-700 text-center mb-6 animate-fadeIn">Welcome Back</h2>
    <p class="text-gray-500 text-center mb-8 animate-slideDown">Please login to your account</p>
    <form>
        <div class="mb-4">
            <label for="email" class="block text-gray-700 font-medium">Email Address</label>
            <input type="email" id="email" name="email" placeholder="example@mail.com" class="w-full px-4 py-2 mt-2 bg-gray-100 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500">
        </div>
        <div class="mb-6">
            <label for="password" class="block text-gray-700 font-medium">Password</label>
            <input type="password" id="password" name="password" placeholder="Enter your password" class="w-full px-4 py-2 mt-2 bg-gray-100 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500">
        </div>
        <div class="flex items-center justify-between">
            <label class="flex items-center text-sm text-gray-600">
                <input type="checkbox" class="mr-2">
                Remember me
            </label>
            <a href="#" class="text-sm text-purple-500 hover:underline">Forgot password?</a>
        </div>
        <button type="submit" class="w-full mt-4 bg-gradient-to-r from-purple-500 to-blue-500 text-white py-2 rounded-md hover:from-purple-600 hover:to-blue-600 focus:outline-none focus:ring-4 focus:ring-purple-300 animate-pulse">Login</button>
    </form>
    <div class="relative flex items-center my-6">
        <div class="flex-grow border-t border-gray-300"></div>
        <span class="mx-4 text-gray-400">OR</span>
        <div class="flex-grow border-t border-gray-300"></div>
    </div>
    <div class="flex space-x-4">
        <button class="flex-1 flex items-center justify-center px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">
            <svg class="w-5 h-5 mr-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 6.071 4.438 11.092 10.203 11.891v-8.401h-3.076v-3.49h3.076v-2.66c0-3.044 1.794-4.708 4.548-4.708 1.312 0 2.686.235 2.686.235v2.95h-1.513c-1.49 0-1.952.928-1.952 1.873v2.309h3.328l-.531 3.49h-2.797v8.401c5.765-.799 10.203-5.82 10.203-11.891z"/></svg>
            Facebook
        </button>
        <button class="flex-1 flex items-center justify-center px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-600">
            <svg class="w-5 h-5 mr-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 6.071 4.438 11.092 10.203 11.891v-8.401h-3.076v-3.49h3.076v-2.66c0-3.044 1.794-4.708 4.548-4.708 1.312 0 2.686.235 2.686.235v2.95h-1.513c-1.49 0-1.952.928-1.952 1.873v2.309h3.328l-.531 3.49h-2.797v8.401c5.765-.799 10.203-5.82 10.203-11.891z"/></svg>
            Google
        </button>
    </div>
</div>
</body>
</html>
