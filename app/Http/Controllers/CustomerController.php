<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;

class CustomerController extends Controller
{
    public function Customer_store(Request $request)
    {
        // Validate input data
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'mobile' => 'nullable|string|max:20',

        ]);

        // Create new customer record
        Customer::create($request->all());

        // Redirect with success message
        return redirect()->back()->with('success', 'Customer added successfully!');
    }
    public function searchCustomers(Request $request)
    {
        $query = $request->input('query');

        $customers = Customer::where('customer_name', 'LIKE', "%{$query}%")
            ->orWhere('mobile', 'LIKE', "%{$query}%")
            ->get(['id', 'customer_name', 'mobile']); // Fetch required columns only

        return response()->json($customers);
    }
}
