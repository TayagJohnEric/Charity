<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donation History</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body class="bg-gray-100">

    <div class="flex">
        <!-- Sidebar -->
        <aside class="w-64 bg-white h-screen shadow-lg">
            <div class="p-6">
                 <!-- Navigation -->
                 <!-- Navigation -->
                 <nav class="flex flex-col items-center">
                    <!-- Logo -->
                    <div class="mb-8">
                        <a href="/">
                            <img src="{{ asset('images/logo2.png') }}" alt="Charity Logo" class="h-[100px] w-auto">
                        </a>
                    </div>
                
                    <!-- Sidebar Menu -->
                    <ul class="w-full">
                        <li class="mb-4">
                            <a href="{{ route('admin.dashboard') }}" 
                               class="flex items-center px-4 py-2 rounded-xl 
                                      {{ Route::is('admin.dashboard') ? 'bg-yellow-500 text-white' : 'text-gray-600 hover:text-yellow-500 hover:bg-gray-100' }}">
                                <i class="fas fa-home mr-3"></i> Dashboard
                            </a>
                        </li>
                        <li class="mb-4">
                            <a href="{{ route('admin.viewDonors') }}" 
                               class="flex items-center px-4 py-2 rounded-xl 
                                      {{ Route::is('admin.viewDonors') ? 'bg-yellow-500 text-white' : 'text-gray-600 hover:text-yellow-500 hover:bg-gray-100' }}">
                                <i class="fas fa-users mr-3"></i> View Donors
                            </a>
                        </li>
                        <li class="mb-4">
                            <a href="{{ route('admin.manageCampaigns') }}" 
                               class="flex items-center px-4 py-2 rounded-xl
                                      {{ Route::is('admin.manageCampaigns') ? 'bg-yellow-500 text-white' : 'text-gray-600 hover:text-yellow-500 hover:bg-gray-100' }}">
                                <i class="fas fa-bullhorn mr-3"></i> Manage Campaigns
                            </a>
                        </li>
                        <li class="mb-4">
                            <a href="{{ route('admin.donationHistory') }}" 
                               class="flex items-center px-4 py-2 rounded-xl 
                                      {{ Route::is('admin.donationHistory') ? 'bg-yellow-500 text-white' : 'text-gray-600 hover:text-yellow-500 hover:bg-gray-100' }}">
                                <i class="fas fa-hand-holding-heart mr-3"></i> Donation History
                            </a>
                        </li>
                        <li class="mb-4">
                            <a href="{{ route('admin.generateReport') }}" 
                               class="flex items-center px-4 py-2 rounded-xl
                                      {{ Route::is('admin.generateReport') ? 'bg-yellow-500 text-white' : 'text-gray-600 hover:text-yellow-500 hover:bg-gray-100' }}">
                                <i class="fas fa-chart-bar mr-3"></i> Generate Reports
                            </a>
                        </li>
                    </ul>
                </nav>

            </div>
            <div class="absolute bottom-0 p-6 mb-[20px]">
                <a href="{{ route('admin.login') }}" class="flex items-center text-gray-600 hover:text-yellow-500">
                    <i class="fas fa-sign-out-alt mr-3"></i> Log out
                </a>
            </div>
        </aside>
       
        <!-- Main Content -->
        <main class="flex-1 p-6">
            <!-- Header -->
            <header class="relative mb-6">
                <!-- Search Bar -->
                <div class="relative w-1/2">
                </div>

                <!-- User Menu -->
                <div class="absolute top-0 right-0 p-3 flex items-center space-x-4">
                    <button class="p-3 rounded-full hover:bg-gray-200">
                        <i class="fas fa-bell text-gray-600"></i>
                    </button>
                    <div class="flex items-center">
                        <img 
                            src="https://storage.googleapis.com/a1aa/image/IwdfLeVOMHkyAUHNRW7gMniAEn0AoryGiLh8K1NoXe9ZpRwnA.jpg" 
                            alt="User avatar" 
                            width="40" 
                            height="40" 
                            class="rounded-full"
                        >
                        <div class="ml-2">
                            <p class="text-gray-800 font-semibold">Admin</p>
                            <p class="text-gray-500 text-sm">admin@example.com</p>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Filter Form -->
            <form action="{{ route('admin.filterDonations') }}" method="GET" class="flex items-center gap-4 mb-6">
                <div class="relative">
                    <label for="campaign" class="sr-only">Campaign</label>
                    <select id="campaign" name="campaign" class="p-2 border rounded-lg bg-white text-gray-600">
                        <option value="">All Campaigns</option>
                        @foreach($campaigns as $campaign)
                            <option value="{{ $campaign->id }}" {{ request('campaign') == $campaign->id ? 'selected' : '' }}>
                                {{ $campaign->title }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="relative">
                    <label for="date" class="sr-only">Date</label>
                    <input type="date" id="date" name="date" class="p-2 border rounded-lg bg-white text-gray-600" value="{{ request('date') }}">
                </div>
                <button type="submit" class="px-4 py-2 bg-yellow-500 text-white rounded-lg shadow hover:bg-yellow-600">Filter</button>
            </form>

            <!-- Export Button -->
            <a href="{{ route('admin.exportDonations', [
                'campaign' => request('campaign'),
                'date' => request('date'),
            ]) }}" class="bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700">
                Export Donations
            </a>

            <!-- Donation Table -->
            <section class="bg-white p-6 rounded-lg shadow-lg mt-6">
                <table class="w-full text-left">
                    <thead>
                        <tr class="border-b">
                            <th class="py-3 px-4 text-gray-600">Donor Name</th>
                            <th class="py-3 px-4 text-gray-600">Campaign Title</th>
                            <th class="py-3 px-4 text-gray-600">Amount</th>
                            <th class="py-3 px-4 text-gray-600">Donation Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($donations as $donation)
                            <tr class="border-t">
                                <td class="py-3 px-4">{{ $donation->donor->name ?? 'N/A' }}</td>
                                <td class="py-3 px-4">{{ $donation->campaign->title ?? 'N/A' }}</td>
                                <td class="py-3 px-4">${{ number_format($donation->amount, 2) }}</td>
                                <td class="py-3 px-4">{{ $donation->created_at->format('M d, Y') }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="py-3 px-4 text-center text-gray-500">No donations found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </section>
        </main>
    </div>

</body>
</html>
