<?php

namespace App\Http\Controllers;

use App\Category;
use App\Subcategory;
use App\Product;
use App\Bill;
use App\Sale;
use App\Order;
use App\Takeaway;
use App\TakeawayItem;
use App\Permission;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class BillingController extends Controller
{
    // public function index()
    // {
    //     $categories = Category::all(); // Fetch all categories
    //     $products = Product::all(); // Fetch all products

    //     return view('admin.billing.index', compact('categories', 'products'));
    // }

    public function index($order_id = null)
    {
        $categories = Category::all();
        $products = Product::all();
        $order = null;
        $orderItems = [];

        // Fetch order if order_id is provided
        if ($order_id) {
            $order = Order::with('items.product')->find($order_id);
            if ($order) {
                $orderItems = $order->items;
            }
        }

        // Debug to check order
        // dd($orderItems);

        return view('admin.billing.index', compact('categories', 'products', 'order', 'orderItems'));
    }

    public function combinedBilling($orderIds)
    {
        // Split the orderIds into an array
        $orderIds = explode(',', $orderIds);

        // Retrieve the orders based on the selected IDs
        $orders = Order::whereIn('id', $orderIds)->with('items.product')->get();

        // Combine the orders as needed
        $combinedTotal = $orders->sum('total_amount');
        $orderItems = $orders->flatMap(function ($order) {
            return $order->items; // Assuming the order has items that need to be combined
        });

        // Fetch categories and products (same as in index method)
        $categories = Category::all();
        $products = Product::all();
        $order = $orders;

        // Pass the combined data to the billing view
        return view('admin.billing.combine', compact('categories', 'products', 'order', 'orderItems', 'combinedTotal'));
    }



    public function billings()
    {
        $categories = Category::all();
        $products = Product::all();
        $order = null;
        $orderItems = [];

        // Fetch order if order_id is provided


        // Debug to check order
        // dd($orderItems);

        return view('admin.billing.index1', compact('categories', 'products', 'order', 'orderItems'));
    }





    public function getProductByBarcode(Request $request)
    {
        $product = Product::where('barcode', $request->barcode)->first();

        if ($product) {
            return response()->json(['success' => true, 'product' => $product]);
        } else {
            return response()->json(['success' => false]);
        }
    }
    public function getProductsByBarcodes(Request $request)
    {
        $searchTerm = $request->input('search');

        if (!$searchTerm) {
            return response()->json(['success' => false, 'message' => 'Invalid search input']);
        }

        // Search by barcode or name (case-insensitive)
        $products = Product::where('barcode', $searchTerm)
            ->orWhere('name', 'LIKE', "%{$searchTerm}%")
            ->get();

        if ($products->isEmpty()) {
            return response()->json(['success' => false, 'message' => 'No products found']);
        }

        return response()->json(['success' => true, 'products' => $products]);
    }





    public function storeBill(Request $request)
    {
        DB::beginTransaction();

        try {
            // Create Bill
            $bill = Bill::create([
                'user_id' => auth()->id(),
                'customer_id' => $request->customer_id ?? null,
                'total_amount' => $request->total_amount,
                'paid_amount' => $request->paid_amount,
                'remaining_credit' => $request->remaining_credit,
            ]);

            // Create Sales
            foreach ($request->sales as $sale) {
                Sale::create([
                    'bill_id' => $bill->id,
                    'product_id' => $sale['product_id'],
                    'quantity' => $sale['quantity'],
                    'unit_price' => $sale['unit_price'],
                    'total_price' => $sale['total_price'],
                ]);
            }

            DB::commit();
            return response()->json(['success' => true, 'message' => 'Bill and Sales recorded successfully.']);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }
    public function Billinglist()
    {
        $bills = Bill::all();
        return view('admin.billing.billinglist', compact('bills'));
    }

    public function updateStatus($orderIds)
    {
        // Split the order IDs
        $orderIds = explode(',', $orderIds);

        // Update the status of all selected orders to "billed"
        Order::whereIn('id', $orderIds)->update(['status' => 'billed']);

        return response()->json(['message' => 'Status updated successfully.']);
    }


    public function store(Request $request)
    {
        $takeaway = Takeaway::create([
            'user_id' => auth()->id(),
            'items' => $request->total_items,
            'subtotal' => $request->subtotal,
            'tax' => $request->tax,
            'discount' => $request->discount,
            'total' => $request->total,
            'payment_type' => $request->payment_type,
            'status' =>0        ]);

        foreach ($request->items as $item) {
            TakeawayItem::create([
                'takeaway_id' => $takeaway->id,
                'product_id' => $item['product_id'],
                'item_name' => $item['product_name'],
                'quantity' => $item['qty'],
                'price' => $item['price'],
                'subtotal' => $item['total']
            ]);
        }

        return response()->json(['success' => true]);
    }
    // public function Take_away()
    // {
    //     $takeaways = Takeaway::with('items')
    //         ->whereDate('created_at', Carbon::today())
    //         ->get();

    //     return view('admin.billing.takeaway_list', compact('takeaways'));
    // }
    public function Take_away()
    {
        $takeaways = DB::table('takeaways')
            ->join('takeaway_items', 'takeaways.id', '=', 'takeaway_items.takeaway_id')
            ->select(
                'takeaways.id',
                'takeaway_items.item_name',
                'takeaway_items.quantity',
                'takeaway_items.price',
                'takeaways.subtotal'
            )
            ->whereDate('takeaways.created_at', Carbon::today())
            ->where('takeaways.status', '!=', 1) // ✅ Exclude status = 1
            ->get();
    
        return view('admin.billing.takeaway_list', compact('takeaways'));
    }
    

    public function getTakeawaySubtotal($id)
    {
        $subtotal = DB::table('takeaways')->where('id', $id)->value('subtotal');
        return response()->json(['subtotal' => $subtotal]);
    }

    public function getTakeawayReceipt($id)
    {
        $takeawayData = DB::table('takeaways')
            ->join('takeaway_items', 'takeaways.id', '=', 'takeaway_items.takeaway_id')
            ->select(
                'takeaways.id as order_id',
                'takeaways.created_at',
                'takeaways.subtotal',
                'takeaways.tax_percentage',
                'takeaways.tax_amount',
                'takeaways.discount',
                'takeaways.total_payable',
                'takeaway_items.item_name',
                'takeaway_items.quantity',
                'takeaway_items.price'
            )
            ->where('takeaways.id', $id)
            ->get();

        if ($takeawayData->isEmpty()) {
            return response()->json(['error' => 'Takeaway not found'], 404);
        }

        $first = $takeawayData->first();
        $items = $takeawayData->map(function ($item) {
            return [
                'item_name' => $item->item_name,
                'quantity' => $item->quantity,
                'price' => $item->price,
            ];
        });

        return response()->json([
            'date' => \Carbon\Carbon::parse($first->created_at)->format('d M Y H:i'),
            'subtotal' => $first->subtotal,
            'discount' => $first->discount,
            'tax_percentage' => $first->tax_percentage,
            'tax_amount' => $first->tax_amount,
            'total_payable' => $first->total_payable,
            'items' => $items,
        ]);
    }
    public function markTakeawayAsPrinted($id)
    {
        DB::table('takeaways')->where('id', $id)->update(['status' => 1]);

        return response()->json(['success' => true]);
    }
    public function Bill_Reports(Request $request)
    {
        // Get all products for the select dropdown
        $products = Product::all();
    
        // Build the query
        $query = DB::table('orders')
            ->join('order_items', 'orders.id', '=', 'order_items.order_id')
            ->join('products', 'order_items.product_id', '=', 'products.id')
            ->select(
                'orders.id as order_id',
                'orders.created_at as date',
                'products.name as product_name',
                'order_items.quantity',
                'order_items.total_price'
            );
    
        // Apply date filters
        if ($request->filled('from')) {
            $query->whereDate('orders.created_at', '>=', $request->from);
        }
        if ($request->filled('to')) {
            $query->whereDate('orders.created_at', '<=', $request->to);
        }
    
        // Apply product filter if selected
        if ($request->filled('product')) {
            $query->where('products.id', $request->product);
        }
    
        // Execute and group the results
        $reports = $query->orderBy('orders.created_at', 'desc')->get();
        $groupedReports = $reports->groupBy('order_id');
    
        // Calculate grand total
        $grandTotal = $reports->sum('total_price');
        $totalQuantity = $reports->sum('quantity');

        // Pass everything to the view
        return view('admin.billing.bill_reports', compact('groupedReports', 'grandTotal', 'products','totalQuantity'));
    }

}
