<?php

namespace App\Http\Controllers;

use App\Category;
use App\Subcategory;
use App\Product;
use Illuminate\Http\Request;
use App\Bill;
use App\User;
use App\Order; // Change to Sale model
use Illuminate\Support\Facades\Auth;

class BillController extends Controller
{
    public function index()
    {
        // Fetch only billed orders with related order items and products
        $bills = Order::with('items.product')
            ->where('status', 'billed')
            ->get();
        return view('admin.bills.index', compact('bills'));
    }

    public function show($id)
    {
        // Load the billed order along with its related order items and products
        $bill = Order::with(['items.product'])->where('status', 'billed')->findOrFail($id);
        return view('admin.bills.show', compact('bill'));
    }


    public function order_list()
    {
        // Get all waiters for the shop
        $waiters = User::where('role_id', 4)->get()->keyBy('id');

        // Fetch orders
        $orders = Order::where('status', 'pending')
            ->orderBy('created_at', 'desc')
            ->get();




        return view('admin.billing.order_list', compact('orders', 'waiters'));
    }

    public function updateStatus($id)
    {
        $order = Order::findOrFail($id);
        $order->status = 'billed';
        $order->save();

        return response()->json(['success' => true]);
    }
}
