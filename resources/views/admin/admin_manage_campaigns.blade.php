<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Campaigns</title>
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
        <header class="flex justify-between items-center mb-6">
            <div class="relative w-1/2">
                <form action="{{ route('admin.manageCampaigns') }}" method="GET" class="w-full">
                    <input 
                        type="text" 
                        name="search" 
                        value="{{ request('search') }}" 
                        placeholder="Search Campaigns" 
                        class="w-full p-3 pl-10 rounded-lg shadow-sm border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    >
                    <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                </form>
            </div>
            <div class="flex items-center">
                <button class="p-3 rounded-full hover:bg-gray-200">
                    <i class="fas fa-bell text-gray-600"></i>
                </button>
                <div class="ml-4 flex items-center">
                    <img src="https://storage.googleapis.com/a1aa/image/IwdfLeVOMHkyAUHNRW7gMniAEn0AoryGiLh8K1NoXe9ZpRwnA.jpg" alt="User avatar" width="40" height="40" class="rounded-full">
                    <div class="ml-2">
                        <p class="text-gray-800 font-semibold">Admin</p>
                        <p class="text-gray-500 text-sm">admin@example.com</p>
                    </div>
                </div>
            </div>
        </header>

        <div class="mb-6 flex gap-4">
            <a href="{{ route('admin.addCampaign') }}" class="p-3 bg-yellow-500 text-white rounded-lg hover:bg-yellow-600 inline-block">
                <i class="fas fa-plus"></i> Add Campaign
            </a>
        </div>

        <section class="bg-white p-6 rounded-lg shadow-lg">
            <table class="w-full text-left">
                <thead>
                    <tr>
                        <th class="py-3 px-4 text-gray-600">Title</th>
                        <th class="py-3 px-4 text-gray-600">Start Date</th>
                        <th class="py-3 px-4 text-gray-600">End Date</th>
                        <th class="py-3 px-4 text-gray-600">Goal Amount</th>
                        <th class="py-3 px-4 text-gray-600">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($campaigns as $campaign)
                        <tr class="border-t">
                            <td class="py-3 px-4">{{ $campaign->title }}</td>
                            <td class="py-3 px-4">{{ $campaign->start_date }}</td>
                            <td class="py-3 px-4">{{ $campaign->end_date }}</td>
                            <td class="py-3 px-4">${{ number_format($campaign->goal_amount, 2) }}</td>
                            <td class="py-3 px-4">
                                <a href="{{ route('campaign.view', $campaign) }}"
                                class="inline-flex justify-center items-center py-2 px-4 text-white bg-blue-500 hover:bg-blue-600 rounded-full shadow-md focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-50 mr-4">
                                 <i class="fas fa-eye"></i>
                             </a>          
                                
                             <form action="{{ route('campaign.destroy', $campaign) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="inline-flex justify-center items-center py-2 px-4 text-white bg-red-500 hover:bg-red-600 rounded-full shadow-md focus:outline-none focus:ring-2 focus:ring-red-400 focus:ring-opacity-50">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-3">No campaigns available.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </section>
    </main>
</div>

</body>
</html>
