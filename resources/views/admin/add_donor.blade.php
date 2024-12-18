<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Donor</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="bg-white shadow-lg rounded-lg p-8 w-full max-w-md">
        <!-- Back Button and Heading -->
        <div class="flex items-center space-x-4 mb-6">
            <!-- Back Button -->
            <button onclick="history.back()" 
                    class="px-4 py-2 bg-gray-700 text-white font-semibold rounded-lg shadow hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-gray-800">
                ← Back
            </button>
            <!-- Heading -->
            <h2 class="text-2xl font-bold text-gray-800">Add Donor</h2>
        </div>

        <!-- Success Message -->
        @if (session('success'))
        <div class="bg-green-100 text-green-700 border border-green-400 rounded-lg p-4 mb-4">
            {{ session('success') }}
        </div>
        @endif

        <!-- Error Messages -->
        @if ($errors->any())
        <div class="bg-red-100 text-red-700 border border-red-400 rounded-lg p-4 mb-4">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('donors.store') }}" method="POST" class="space-y-4">
            @csrf

            <!-- Donor Name -->
            <div>
                <label for="name" class="block text-gray-700 font-medium mb-2">Name</label>
                <input type="text" 
                       id="name" 
                       name="name" 
                       class="w-full border border-gray-200 rounded-lg px-4 py-2 focus:ring-2 focus:ring-yellow-500 focus:outline-none"
                       placeholder="Enter donor name" 
                       required>
            </div>

            <!-- Email -->
            <div>
                <label for="email" class="block text-gray-700 font-medium mb-2">Email</label>
                <input type="email" 
                       id="email" 
                       name="email" 
                       class="w-full border border-gray-200 rounded-lg px-4 py-2 focus:ring-2 focus:ring-yellow-500 focus:outline-none"
                       placeholder="Enter donor email" 
                       required>
            </div>

            <!-- Contact Info -->
            <div>
                <label for="contact_info" class="block text-gray-700 font-medium mb-2">Contact Info</label>
                <input type="text" 
                       id="contact_info" 
                       name="contact_info" 
                       class="w-full border border-gray-200 rounded-lg px-4 py-2 focus:ring-2 focus:ring-yellow-500 focus:outline-none"
                       placeholder="Enter donor contact info (optional)">
            </div>

            <!-- Submit Button -->
            <button type="submit" 
                    class="w-full bg-yellow-500 text-white font-medium py-2 px-4 rounded-lg hover:bg-yellow-600 focus:ring-2 focus:ring-yellow-500 focus:outline-none">
                Save Donor
            </button>
        </form>
    </div>
</body>
</html>
