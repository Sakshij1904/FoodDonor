<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FoodDonation;

class FoodDonationController extends Controller
{

    // Donor Form
    public function index()
    {
        return view('donor');
    }

    // Save Donation
    public function store(Request $request)
    {
        $request->validate([
            'donor_name' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'food_type' => 'required',
            'quantity' => 'required',
            'address' => 'required',
            'expiry_time' => 'required'
        ]);

        FoodDonation::create([
            'donor_name' => $request->donor_name,
            'phone' => $request->phone,
            'email' => $request->email,
            'food_type' => $request->food_type,
            'quantity' => $request->quantity,
            'address' => $request->address,
            'expiry_time' => $request->expiry_time,
            'status' => 'Available'
        ]);

        return redirect('/')->with('success', 'Food Donated Successfully');
    }

    // Dashboard
    public function dashboard(Request $request)
    {
        $search = $request->search;
        $status = $request->status;

        $donations = FoodDonation::when($search, function ($query) use ($search) {
            return $query->where('donor_name', 'like', "%$search%")
                         ->orWhere('food_type', 'like', "%$search%");
        })
        ->when($status, function ($query) use ($status) {
            return $query->where('status', $status);
        })
        ->latest()
        ->get();

        $total = FoodDonation::count();
        $available = FoodDonation::where('status', 'Available')->count();
        $accepted = FoodDonation::where('status', 'Accepted')->count();
        $expired = FoodDonation::where('expiry_time', '<', now())->count();

        return view('dashboard', compact(
            'donations',
            'total',
            'available',
            'accepted',
            'expired'
        ));
    }
    // Accept Pickup
    public function accept($id)
    {
        $food = FoodDonation::findOrFail($id);

        $food->status = "Accepted";
        $food->save();

        return redirect('/dashboard')->with('success', 'Food Accepted Successfully');
    }

    // Edit Donation
    public function edit($id)
    {
        $food = FoodDonation::findOrFail($id);

        return view('edit', compact('food'));
    }

    // Update Donation
    public function update(Request $request, $id)
    {
        $food = FoodDonation::findOrFail($id);

        $food->update([
            'donor_name' => $request->donor_name,
            'phone' => $request->phone,
            'food_type' => $request->food_type,
            'quantity' => $request->quantity,
            'expiry_time' => $request->expiry_time
        ]);

        return redirect('/dashboard')->with('success', 'Donation Updated Successfully');
    }

    // Delete Donation
    public function delete($id)
    {
        FoodDonation::findOrFail($id)->delete();

        return redirect('/dashboard')->with('success', 'Donation Deleted Successfully');
    }
}
