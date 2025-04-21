<?php

namespace App\Http\Controllers;

use App\Purchase;
use App\Product;
use App\Party;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PurchaseController extends Controller
{
    // Display all purchases
    public function index()
{
    $purchases = Purchase::with(['user', 'items.product', 'items'])
        ->where('user_id', Auth::id())
        ->get();
    return view('admin.purchases.index', compact('purchases'));
}

    // Show the form to create a new purchase
    public function create()
    {
        $products = Product::all();
        $parties = Party::all(); // Fetch all parties
        return view('admin.purchases.create', compact('products', 'parties'));
    }

    // Store a newly created purchase
    public function store(Request $request)
{
    $request->validate([
        'party_id' => 'required|exists:parties,id',
        'invoice_number' => 'required|string|max:255',
        'invoice_date' => 'required|date',
        'invoice_amount' => 'required|numeric|min:0',
        'product_id.*' => 'required|exists:products,id',
        'quantity.*' => 'required|numeric|min:1',
        'unit_price.*' => 'required|numeric|min:0',
        'total_price.*' => 'required|numeric|min:0',
    ]);

    // Create the main purchase entry
    $purchase = Purchase::create([
        'user_id' => auth()->id(),
        'party_id' => $request->party_id,
        'invoice_number' =>$request->invoice_number,
        'invoice_date' => $request->invoice_date,
        'invoice_amount' => $request->invoice_amount,
        'total_price' => array_sum($request->total_price),
    ]);

    // Add purchase items
    foreach ($request->product_id as $index => $productId) {
        $purchase->items()->create([
            'product_id' => $productId,
            'quantity' => $request->quantity[$index],
            'unit_price' => $request->unit_price[$index],
            'discount_percentage' => $request->discount_percentage[$index] ?? 0,
            'discount_amount' => $request->discount[$index] ?? 0,
            'tax_percentage' => $request->tax_percentage[$index] ?? 0,
            'tax_amount' => $request->tax[$index] ?? 0,
            'total_price' => $request->total_price[$index],
        ]);
    }

    return redirect()->route('purchases.index')->with('success', 'Purchase created successfully.');
}





    public function storeParty(Request $request)
    {


        $request->validate([
            'name' => 'required|string|max:255|unique:parties,name',
            'contact_person' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:15',
            'email' => 'nullable|email|max:255',
            'address' => 'nullable|string',
        ]);

        $party = Party::create($request->all());



        return response()->json(['success' => true, 'party' => $party]);
    }
    public function getProductByBarcode(Request $request)
    {
        $barcode = $request->barcode;

        // Fetch product details based on the barcode
        $product = Product::where('barcode', $barcode)->with('category')->first();

        if ($product) {
            return response()->json([
                'name' => $product->name,
                'category_name' => $product->category->category_name ?? 'Unknown Category',
                'quantity' => $product->quantity,
                'cost' => $product->cost,
                'image' => $product->image ? asset('storage/' . $product->image) : null
            ]);
        } else {
            return response()->json(null);
        }
    }

    public function show($id)
    {
        $purchase = Purchase::with(['user', 'items.product', 'items'])->findOrFail($id);
    
        return response()->json([
            'purchase' => $purchase,
            'items' => $purchase->items,
            'party' => $purchase->party, // Assuming Purchase has a relationship with Party
        ]);
    }
    
}
