<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Product;
use App\Category;
use App\Subcategory;
use Carbon\Carbon;

use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        // Get logged-in user ID
        $userId = auth()->id();

        // Get today's date
        $today = Carbon::now()->toDateString();

        // Fetch all products for the logged-in user
        $products = Product::with('category', 'subcategory')
            ->where('user_id', $userId)
            ->get();

        // Fetch only special dishes created today
        $specialProducts = Product::with('category', 'subcategory')
            ->where('user_id', $userId)
            ->where('special', 'special')
            ->whereDate('created_at', $today) // Filter products created today
            ->get();

        return view('admin.products.index', compact('products', 'specialProducts'));
    }




    public function add()
    {
        $userId = Auth::id(); // Get logged-in user ID
        $categories = Category::where('user_id', $userId)->get();
        $subcategories = Subcategory::where('user_id', $userId)->get();

        return view('admin.products.create', compact('categories', 'subcategories'));
    }

    public function store(Request $request)
    {
        // Validate input data


        // Handle image upload
        $imageName = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName(); // ✅ Store original name with timestamp
            $image->move(public_path('uploads'), $imageName); // ✅ Move image to public/uploads
        }
        // Insert product into the database
        Product::create([
            'user_id' => auth()->id(),
            'name' => $request->name,
            'category_id' => $request->category_id,
            'sub_category_id' => $request->sub_category_id,
            'special' => $request->special,
            'cost' => $request->product_cost,
            'cost' => $request->product_selling_cost,
            'product_selling_cost' => $request->product_selling_cost,
            'unit' => $request->unit,
            'quantity' => $request->product_quantity,
            'barcode'  => 123,
            'image' => $imageName,
            'description' => $request->product_details,
        ]);

        return redirect()->route('product.add')->with('success', 'Product added successfully!');
    }

    public function edit($id)
    {
        // Find the product by ID
        $product = Product::findOrFail($id);

        // Fetch categories and subcategories
        $categories = Category::all();
        $subcategories = Subcategory::where('category_id', $product->category_id)->get();

        // Return the edit view with product details
        return view('admin.products.create', compact('product', 'categories', 'subcategories'));
    }

    public function getSubcategories(Request $request)
    {
        $userId = Auth::id(); // Get the logged-in user's ID

        if (!$request->category_id) {
            return response()->json([]); // Return an empty array if category_id is missing
        }

        $subcategories = Subcategory::where('category_id', $request->category_id)
            ->where('user_id', $userId)
            ->get();

        return response()->json($subcategories);
    }

    public function update(Request $request, $id)
    {


        $product = Product::findOrFail($id);

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads'), $imageName);
            $product->image = $imageName;
        }

        $product->update([
            'name' => $request->name,
            'barcode' => 123,
            'category_id' => $request->category_id,
            'sub_category_id' => $request->sub_category_id,
            'cost' => $request->product_selling_cost,
            'product_selling_cost' => $request->product_selling_cost,
            'unit' => $request->unit,
            'quantity' => $request->product_quantity,
            'description' => $request->product_details,
        ]);

        return redirect()->route('product.index')->with('success', 'Product updated successfully!');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        // Delete the image if it exists
        if ($product->image && file_exists(public_path('uploads/' . $product->image))) {
            unlink(public_path('uploads/' . $product->image));
        }

        $product->delete();

        return redirect()->route('product.index')->with('success', 'Product deleted successfully!');
    }
}
