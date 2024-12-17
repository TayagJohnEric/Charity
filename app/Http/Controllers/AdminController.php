<?php

namespace App\Http\Controllers;
use App\Models\Donor;
use App\Models\Campaign;
use App\Models\Donation;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function login(){

        return view('login');
    }
    
    public function dashboard()
{
    // Calculate the total donations
    $totalDonations = Donation::sum('amount'); // Sum of all donation amounts

    // Count the number of donations
    $numberOfDonations = Donation::count();

    // Count the total number of registered donors
    $totalDonors = Donor::count();

    // Pass data to the view
    return view('admin.admin_dashboard', compact('totalDonations', 'numberOfDonations', 'totalDonors'));
}


public function viewDonors(Request $request)
{
    // Check if there's a search query in the request
    $search = $request->input('search');

    // If search is provided, filter the donors by name, otherwise fetch all donors
    if ($search) {
        $donors = Donor::where('name', 'like', '%' . $search . '%')->get();
    } else {
        $donors = Donor::all();
    }

    // Pass the donors and the search query to the view
    return view('admin.admin_view_donor', compact('donors', 'search'));
}

public function manageCampaigns(Request $request)
{
    // Get the search term from the request
    $search = $request->input('search');

    // If there's a search query, filter the campaigns by title (or any other field you'd like to search by)
    if ($search) {
        $campaigns = Campaign::where('title', 'like', '%' . $search . '%')->get();
    } else {
        // Fetch all campaigns if there's no search query
        $campaigns = Campaign::all();
    }

    // Pass the campaigns and search term to the view
    return view('admin.admin_manage_campaigns', compact('campaigns', 'search'));
}


public function generateReport()
{
    // Fetch all donations with related donor and campaign data
    $donations = Donation::with(['donor', 'campaign'])->get();
    $campaigns = Campaign::all(); // Fetch all campaigns for the dropdown

    // Pass the data to the view
    return view('admin.admin_generate_report', compact('donations', 'campaigns'));
}

public function donationHistory(){

    $donations = Donation::with(['donor', 'campaign'])->get();

    return view('admin.admin_donation_history', compact('donations'));
}

public function filterDonations(Request $request)
{
    $query = Donation::with(['donor', 'campaign']);

    if ($request->has('campaign') && $request->campaign) {
        $query->where('campaign_id', $request->campaign);
    }

    if ($request->has('date') && $request->date) {
        $query->whereDate('created_at', $request->date);
    }

    $donations = $query->get();

    $campaigns = Campaign::all(); // To populate the filter dropdown
    return view('admin.admin_generate_report', compact('donations', 'campaigns'));
}


public function exportDonations(Request $request)
{
    // Fetch filter criteria from the request
    $campaignId = $request->input('campaign');
    $date = $request->input('date');

    // Apply filters to the donations query
    $donations = Donation::with(['donor', 'campaign'])
        ->when($campaignId, function ($query, $campaignId) {
            return $query->where('campaign_id', $campaignId);
        })
        ->when($date, function ($query, $date) {
            return $query->whereDate('created_at', $date);
        })
        ->get();

    // Define the file path
    $tempDir = storage_path('app/temp');
    $fileName = 'filtered_donations_' . now()->format('Y_m_d_H_i_s') . '.csv';
    $filePath = $tempDir . '/' . $fileName;

    // Ensure the temp directory exists
    if (!File::exists($tempDir)) {
        File::makeDirectory($tempDir, 0755, true);
    }

    // Open the file for writing
    $file = fopen($filePath, 'w');
    if (!$file) {
        return back()->with('error', 'Unable to create the CSV file.');
    }

    // Define CSV headers
    $headers = ['Donor Name', 'Campaign Title', 'Amount', 'Donation Date'];

    // Write headers to the CSV
    fputcsv($file, $headers);

    // Write each donation record
    foreach ($donations as $donation) {
        fputcsv($file, [
            $donation->donor->name ?? 'N/A',
            $donation->campaign->title ?? 'N/A',
            $donation->amount,
            $donation->created_at->format('Y-m-d'),
        ]);
    }

    // Close the file
    fclose($file);

    // Return the file for download
    return response()->download($filePath, $fileName)->deleteFileAfterSend(true);
}


public function addDonor(){

    return view('admin.add_donor');
}

public function addCampaign(){

    return view('admin.add_campaign');
}

}
