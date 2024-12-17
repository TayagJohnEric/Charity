<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body class="bg-gray-100">

    <div class="flex">
        <!-- Sidebar -->
        <aside class="w-64 bg-white h-screen shadow-lg">
            <div class="p-6">
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

            <!-- Logout -->
            <div class="absolute bottom-0 p-6 mb-[20px]">
                <a href="{{ route('admin.login') }}" class="flex items-center text-gray-600 hover:text-blue-500">
                    <i class="fas fa-sign-out-alt mr-3"></i> Log out
                </a>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-6">
            <!-- Header -->
            <header class="flex justify-between items-center mb-6">
                <!-- Search Bar -->
                <div class="relative w-1/2">
                </div>

                <!-- User Menu -->
                <div class="flex items-center">
                    <button class="p-3 rounded-full hover:bg-gray-200">
                        <i class="fas fa-bell text-gray-600"></i>
                    </button>
                    <div class="ml-4 flex items-center">
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



           <!-- History Section -->
<section class="bg-white p-6 rounded-lg shadow-lg">
    <h2 class="text-2xl font-bold text-gray-600 mb-4">Donation History</h2>

    @forelse ($donations as $donation)
        <div class="flex items-start p-4 mb-4 bg-gray-100 rounded-lg shadow-sm">
            <div class="flex-shrink-0 bg-yellow-500 text-white h-12 w-12 flex items-center justify-center rounded-full">
                <i class="fas fa-hand-holding-heart"></i>
            </div>
            <div class="ml-4">
                <h3 class="text-lg font-semibold text-blue-800">
                    {{ $donation->donor->name ?? 'N/A' }}
                </h3>
                <p class="text-sm text-gray-600">
                    <strong>Campaign:</strong> {{ $donation->campaign->title ?? 'N/A' }}
                </p>
                <p class="text-sm text-gray-600">
                    <strong>Amount:</strong> ${{ number_format($donation->amount, 2) }}
                </p>
                <p class="text-sm text-gray-600">
                    <strong>Date:</strong> {{ $donation->created_at->format('M d, Y') }}
                </p>
            </div>
        </div>
    @empty
        <div class="p-4 bg-gray-100 text-center text-gray-500 rounded-lg">
            No donations found.
        </div>
    @endforelse
</section>

          
            

        </main>
    </div>

</body>
</html>