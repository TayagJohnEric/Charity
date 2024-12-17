<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Campaign Details</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

<div class="container mx-auto mt-10 px-4">
    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <div class="bg-blue-600 text-white text-center py-6">
            <h2 class="text-2xl font-bold">{{ $campaign->title }}</h2>
        </div>
        <div class="p-6 space-y-4">
            <p class="text-gray-700"><span class="font-semibold">Description:</span> {{ $campaign->description }}</p>
            <p class="text-gray-700"><span class="font-semibold">Start Date:</span> {{ $campaign->start_date }}</p>
            <p class="text-gray-700"><span class="font-semibold">End Date:</span> {{ $campaign->end_date }}</p>
            <p class="text-gray-700"><span class="font-semibold">Goal Amount:</span> ${{ number_format($campaign->goal_amount, 2) }}</p>

            <hr class="border-gray-200">

            <div>
                <h4 class="text-xl font-semibold text-gray-800">Donations</h4>
                @if($campaign->donations->isEmpty())
                    <p class="text-gray-500 mt-2">No donations yet.</p>
                @else
                    <ul class="mt-4 space-y-2">
                        @foreach($campaign->donations as $donation)
                            <li class="bg-gray-100 p-4 rounded-md shadow-sm">
                                <p><span class="font-semibold">Donor:</span> {{ $donation->donor->name ?? 'N/A'  }}</p>
                                <p><span class="font-semibold">Amount:</span> ${{ number_format($donation->amount, 2) }}</p>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
    </div>
</div>

</body>
</html>