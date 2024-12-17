<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Campaign</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <div class="container mx-auto p-8 mt-10 max-w-2xl bg-white shadow-lg rounded-lg">
        <h2 class="text-2xl font-semibold mb-6 text-gray-800">Create New Campaign</h2>
        
        <!-- Success Message -->
        @if (session('success'))
            <div class="mb-6 bg-green-100 text-green-800 border border-green-400 rounded-lg p-4">
                {{ session('success') }}
            </div>
        @endif

        <!-- Error Messages -->
        @if ($errors->any())
            <div class="mb-6 bg-red-100 text-red-800 border border-red-400 rounded-lg p-4">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('campaigns.store') }}" method="POST">
            @csrf
            <!-- Campaign Title -->
            <div class="mb-6">
                <label for="title" class="block text-gray-700 font-medium">Campaign Title</label>
                <input type="text" 
                       id="title" 
                       name="title" 
                       class="mt-2 w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" 
                       value="{{ old('title') }}" 
                       required>
            </div>

            <!-- Campaign Description -->
            <div class="mb-6">
                <label for="description" class="block text-gray-700 font-medium">Campaign Description</label>
                <textarea id="description" 
                          name="description" 
                          rows="4" 
                          class="mt-2 w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" 
                          required>{{ old('description') }}</textarea>
            </div>

            <!-- Goal Amount -->
            <div class="mb-6">
                <label for="goal_amount" class="block text-gray-700 font-medium">Goal Amount</label>
                <input type="number" 
                       id="goal_amount" 
                       name="goal_amount" 
                       step="0.01" 
                       class="mt-2 w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" 
                       value="{{ old('goal_amount') }}" 
                       required>
            </div>

            <!-- Start Date -->
            <div class="mb-6">
                <label for="start_date" class="block text-gray-700 font-medium">Start Date</label>
                <input type="date" 
                       id="start_date" 
                       name="start_date" 
                       class="mt-2 w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" 
                       value="{{ old('start_date') }}" 
                       required>
            </div>

            <!-- End Date -->
            <div class="mb-6">
                <label for="end_date" class="block text-gray-700 font-medium">End Date</label>
                <input type="date" 
                       id="end_date" 
                       name="end_date" 
                       class="mt-2 w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" 
                       value="{{ old('end_date') }}" 
                       required>
            </div>

            <!-- Submit Button -->
            <button type="submit" 
                    class="w-full p-3 bg-blue-500 text-white font-semibold rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                Create Campaign
            </button>
        </form>
    </div>

</body>
</html>
