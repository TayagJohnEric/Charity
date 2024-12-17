<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Donor</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">

    <div class="bg-white shadow-lg rounded-lg p-8 w-full max-w-md">
        <h2 class="text-2xl font-semibold text-gray-800 mb-6">Edit Donor</h2>

        <!-- Display success message if available -->
        @if (session('success'))
            <div class="mb-4 text-green-500">{{ session('success') }}</div>
        @endif

        <!-- Display validation errors -->
        @if ($errors->any())
            <div class="mb-4 text-red-500">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Edit Donor Form -->
        <form action="{{ route('donors.update', $donor->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')  <!-- Specify that this is a PUT request -->

            <!-- Donor Name -->
            <div>
                <label for="name" class="block text-gray-700 font-medium mb-2">Name</label>
                <input type="text" 
                       id="name" 
                       name="name" 
                       value="{{ old('name', $donor->name) }}" 
                       class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none" 
                       placeholder="Enter donor name" 
                       required>
            </div>

            <!-- Email -->
            <div>
                <label for="email" class="block text-gray-700 font-medium mb-2">Email</label>
                <input type="email" 
                       id="email" 
                       name="email" 
                       value="{{ old('email', $donor->email) }}" 
                       class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none" 
                       placeholder="Enter donor email" 
                       required>
            </div>

            <!-- Contact Info -->
            <div>
                <label for="contact_info" class="block text-gray-700 font-medium mb-2">Contact Info</label>
                <input type="text" 
                       id="contact_info" 
                       name="contact_info" 
                       value="{{ old('contact_info', $donor->contact_info) }}" 
                       class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none" 
                       placeholder="Enter donor contact info (optional)">
            </div>

            <!-- Submit Button -->
            <button type="submit" 
                    class="w-full bg-blue-500 text-white font-medium py-2 px-4 rounded-lg hover:bg-blue-600 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                Update Donor
            </button>
        </form>
    </div>

</body>
</html>
