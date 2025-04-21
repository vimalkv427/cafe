<?php

namespace App\Http\Controllers;

use App\Category;
use App\Subcategory;
use App\Product;
use App\Bill;
use App\Sale;
use App\Order;
use App\OrderItem;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class WaiterController extends Controller
{
    // Show products for the waiter to add to the temporary order
    public function index()
    {
        $categories = Category::all(); // Fetch all categories
        $products = Product::all(); // Fetch all products
    
        return view('waiter.orders.index', compact('categories', 'products'));
        
    }

    // Store temporary order (before confirmation)
    public function storeTemporaryOrder(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        session()->push('temporary_order', [
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
            'unit_price' => $request->unit_price,
            'total_price' => $request->unit_price * $request->quantity,
        ]);

        return response()->json(['success' => true, 'message' => 'Item added to order.']);
    }

    // Confirm order and create bill
    public function confirmOrder(Request $request)
    {
        $orderItems = session('temporary_order', []);
        if (empty($orderItems)) {
            return response()->json(['success' => false, 'message' => 'No items in order.']);
        }

        DB::beginTransaction();
        try {
            // Create Bill
            $bill = Bill::create([
                'user_id' => auth()->id(),
                'customer_id' => $request->customer_id ?? null,
                'total_amount' => array_sum(array_column($orderItems, 'total_price')),
                'paid_amount' => 0,
                'remaining_credit' => 0,
            ]);

            // Add Sales
            foreach ($orderItems as $item) {
                Sale::create([
                    'bill_id' => $bill->id,
                    'product_id' => $item['product_id'],
                    'quantity' => $item['quantity'],
                    'unit_price' => $item['unit_price'],
                    'total_price' => $item['total_price'],
                ]);
            }

            DB::commit();
            session()->forget('temporary_order');
            return response()->json(['success' => true, 'message' => 'Order confirmed!']);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }

    // Show order summary for waiter
    public function showOrderSummary()
    {
        $orderItems = session('temporary_order', []);
        return view('waiter.orders.summary', compact('orderItems'));
    }


    public function placeOrder(Request $request)
    {
        // Validate input
        $request->validate([
            'table_id' => 'required|integer',
            'items' => 'required|array|min:1',
            'items.*.product_id' => 'required|integer',
            'items.*.quantity' => 'required|integer|min:1',
            'items.*.unit_price' => 'required|numeric|min:0',
        ]);

        // Calculate total amount
        $totalAmount = 0;
        foreach ($request->items as $item) {
            $totalAmount += $item['quantity'] * $item['unit_price'];
        }

        // Insert order into orders table
        $order = \App\Order::create([
            'table_id' => $request->table_id,
            'total_amount' => $totalAmount,
            'status' => 'pending'
        ]);

        // Insert items into order_items table
        foreach ($request->items as $item) {
            \App\OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item['product_id'],
                'quantity' => $item['quantity'],
                'unit_price' => $item['unit_price'],
                'total_price' => $item['quantity'] * $item['unit_price']
            ]);
        }

        return response()->json(['success' => true, 'order_id' => $order->id]);
    } 

    public function store(Request $request)
    {
        $data = $request->validate([
            'table_id' => 'required|integer',
            'items' => 'required|array',
            'items.*.id' => 'required|integer',
            'items.*.quantity' => 'required|integer',
           'items.*.price' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/',

        ]);

        // Create Order
        $order = Order::create([
            'table_id' => $data['table_id'],
            'waiter_id' => Auth::id(), 
            'total_amount' => collect($data['items'])->sum(fn ($item) => $item['quantity'] * $item['price']),
        ]);

        // Create Order Items
        foreach ($data['items'] as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item['id'],
                'quantity' => $item['quantity'],
                'unit_price' => $item['price'],
               
            ]);
        }

        return response()->json(['message' => 'Order placed successfully!', 'order_id' => $order->id]);
    }

}
