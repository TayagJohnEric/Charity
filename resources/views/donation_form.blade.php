<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Make a Donation</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 py-8">

    <div class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-semibold text-center text-gray-700 mb-6">Make a Donation</h2>

        <!-- Success Message -->
        @if (session('success'))
            <div class="bg-green-100 text-green-800 p-4 mb-4 rounded-md">
                {{ session('success') }}
            </div>
        @endif

        <!-- Error Messages -->
        @if ($errors->any())
            <div class="bg-red-100 text-red-800 p-4 mb-4 rounded-md">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('donations.store') }}" method="POST">
            @csrf
            <!-- Donor -->
            <div class="mb-4">
                <label for="donor_id" class="block text-sm font-medium text-gray-600">Donor</label>
                <select class="mt-1 block w-full p-2.5 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" id="donor_id" name="donor_id" required>
                    <option value="" disabled selected>Select Donor</option>
                    @foreach($donors as $donor)
                        <option value="{{ $donor->id }}">{{ $donor->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Campaign -->
            <div class="mb-4">
                <label for="campaign_id" class="block text-sm font-medium text-gray-600">Campaign</label>
                <select class="mt-1 block w-full p-2.5 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" id="campaign_id" name="campaign_id" required>
                    <option value="" disabled selected>Select Campaign</option>
                    @foreach($campaigns as $campaign)
                        <option value="{{ $campaign->id }}">{{ $campaign->title }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Donation Amount -->
            <div class="mb-4">
                <label for="amount" class="block text-sm font-medium text-gray-600">Amount</label>
                <input type="number" class="mt-1 block w-full p-2.5 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" id="amount" name="amount" step="0.01" min="0" placeholder="Enter donation amount" required>
            </div>

            <!-- Donation Date -->
            <div class="mb-4">
                <label for="donation_date" class="block text-sm font-medium text-gray-600">Donation Date</label>
                <input type="date" class="mt-1 block w-full p-2.5 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" id="donation_date" name="donation_date" value="{{ date('Y-m-d') }}" required>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="w-full py-2 px-4 bg-blue-600 text-white font-semibold rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">Donate</button>
        </form>
    </div>

</body>
</html>
