<?php

namespace App\Http\Controllers;
use App\Models\Campaign;

use Illuminate\Http\Request;

class CampaignController extends Controller
{
    
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:500',
            'start_date' => 'required|date|after_or_equal:today',
            'end_date' => 'required|date|after:start_date',
            'goal_amount' => 'required|numeric|min:1',
        ]);
    
        Campaign::create($validatedData);

        // Redirect with success message
        return redirect()->route('admin.addCampaign')->with('success', 'Campaign created successfully!');
    }
   
    public function view(Campaign $campaign)
    {
        // The $campaign instance is automatically loaded
        $campaign->load('donations'); // Eager load donations

        return view('admin.view_campaign', compact('campaign'));
    }

    public function destroy(Campaign $campaign)
    {
        // Attempt to delete the campaign
        $campaign->delete();

        // Redirect with a success message
        return redirect()->route('admin.manageCampaigns')->with('success', 'Campaign deleted successfully!');
    }
}


