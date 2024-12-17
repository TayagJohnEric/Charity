<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donor Details</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto mt-10 p-8 bg-white shadow-lg rounded-lg">
        <h1 class="text-3xl font-semibold text-gray-800 mb-6">Donor Details</h1>
        
        <!-- Donor Profile Picture -->
        <div class="flex items-center mb-6">
            <img src="{{ $donor->profile_picture ? asset('storage/'.$donor->profile_picture) : asset('images/default-profile.png') }}" 
                 alt="Profile Picture" 
                 class="w-24 h-24 rounded-full object-cover border-1 border-yellow-500 mr-4">
            <div>
                <h2 class="text-2xl font-medium text-gray-700 mb-2">{{ $donor->name }}</h2>
                <p class="text-gray-600"><strong>Email:</strong> {{ $donor->email }}</p>
                <p class="text-gray-600"><strong>Contact Info:</strong> {{ $donor->contact_info ?? 'N/A' }}</p>
            </div>
        </div>

        <!-- Donations -->
        <div>
            <h3 class="text-xl font-semibold text-gray-700 mb-4">Donations</h3>
            @if ($donor->donations->isEmpty())
                <p class="text-gray-500">No donations available.</p>
            @else
                <table class="w-full border-collapse border border-gray-300">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="border border-gray-300 px-4 py-2 text-left">#</th>
                            <th class="border border-gray-300 px-4 py-2 text-left">Amount</th>
                            <th class="border border-gray-300 px-4 py-2 text-left">Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($donor->donations as $index => $donation)
                            <tr class="hover:bg-gray-50">
                                <td class="border border-gray-300 px-4 py-2">{{ $index + 1 }}</td>
                                <td class="border border-gray-300 px-4 py-2">{{ number_format($donation->amount, 2) }}</td>
                                <td class="border border-gray-300 px-4 py-2">{{ $donation->created_at->format('F j, Y') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>

        <!-- Back Button -->
        <div class="mt-6">
            <a href="{{ route('admin.viewDonors') }}" 
               class="px-4 py-2 bg-yellow-500 text-white rounded-lg hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-blue-400">
                Back to List
            </a>
        </div>
    </div>
</body>
</html>
