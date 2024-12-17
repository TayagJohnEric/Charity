<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use App\Models\Donor;
use App\Models\Campaign;
use Illuminate\Http\Request;

class DonationController extends Controller
{
    public function create()
    {
        $donors = Donor::all(); // Get all donors
        $campaigns = Campaign::all(); // Get all campaigns

        return view('donation_form', compact('donors', 'campaigns'));
    }

    public function store(Request $request)
{
    // Validate the request
    $request->validate([
        'donor_id' => 'required|exists:donors,id',
        'campaign_id' => 'required|exists:campaigns,id',
        'amount' => 'required|numeric|min:0.01',
        'donation_date' => 'required|date',
    ]);

    // Create the donation
    Donation::create([
        'donor_id' => $request->donor_id,
        'campaign_id' => $request->campaign_id,
        'amount' => $request->amount,
        'donation_date' => $request->donation_date,
    ]);

        // Redirect back with a success message
        return redirect()->route('donations.create')->with('success', 'Donation made successfully!');
    }
}
