<?php

namespace App\Http\Controllers;
use App\Models\Donor;

use Illuminate\Http\Request;

class DonorController extends Controller
{
    public function store(Request $request)
    {
        // Validation
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:donors,email',
            'contact_info' => 'nullable|string|max:255',
        ]);

        // Create Donor
        Donor::create($validatedData);

        // Redirect with success message
        return redirect()->route('admin.viewDonors')->with('success', 'Donor added successfully!');
    }


    // In DonorController.php
    public function view(Donor $donor)
    {
        // Eager load the donations relationship
        $donor->load('donations');
    
        // Pass the donor data to the view
        return view('admin.view_donor', compact('donor'));
    }
    
    // In DonorController.php

    public function edit(Donor $donor)
    {
        // The donor is automatically injected via route model binding
        // Return the edit view and pass the donor data
        return view('admin.edit_donor', compact('donor'));
    }
    

    // In DonorController.php

public function update(Request $request, $id)
{
    // Validate the input data
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:donors,email,' . $id,
        'contact_info' => 'nullable|string|max:255',
    ]);

    // Find the donor by ID
    $donor = Donor::findOrFail($id);

    // Update the donor's details
    $donor->update($validated);

    // Redirect back with a success message
    return redirect()->route('donors.view', $donor->id)
                     ->with('success', 'Donor information updated successfully.');
}

public function destroy(Donor $donor)
{
    // Delete the donor
    $donor->delete();

    // Redirect back with a success message
    return redirect()->route('admin.viewDonors')->with('success', 'Donor deleted successfully.');
}

    
}
