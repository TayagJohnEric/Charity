<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 h-screen flex items-center justify-center">

    <div class="w-full max-w-md p-8 space-y-6 bg-white shadow-lg rounded-lg">
        <!-- Logo -->
        <div class="flex justify-center">
            <a href="{{ route('landing.page') }}">
                <img src="{{ asset('images/logo2.png') }}" alt="Charity Logo" class="h-[100px] w-auto">
            </a>
        </div>

        <!-- Login Title -->
        <h2 class="text-2xl font-bold text-center text-gray-700">Login</h2>

        <form action="#" method="POST">
            <!-- Email -->
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700"></label>
                <input 
                    type="email" 
                    id="email" 
                    name="email" 
                    required 
                    class="w-full p-3 mt-1 bg-gray-100 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500"
                    placeholder="Enter your email"
                >
            </div>

            <!-- Password -->
            <div class="mb-6">
                <label for="password" class="block text-sm font-medium text-gray-700"></label>
                <input 
                    type="password" 
                    id="password" 
                    name="password" 
                    required 
                    class="w-full p-3 mt-1 bg-gray-100 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500"
                    placeholder="Enter your password"
                >
            </div>

            <!-- Submit Button -->
            <a 
                href="{{ route('admin.dashboard') }}" 
                class="w-full p-3 bg-yellow-500 text-white font-semibold rounded-xl hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-yellow-600 text-center inline-block"
            >
                Login
            </a>

            <!-- Forgot Password -->
            <div class="mt-4 text-center">
                <a href="#" class="text-sm text-blue-500 hover:text-blue-700">Forgot Password?</a>
            </div>
        </form>
    </div>

</body>
</html>
