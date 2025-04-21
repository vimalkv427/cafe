<?php

namespace App\Http\Controllers;

use App\Category;
use App\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class SubcategoryController extends Controller
{
    public function index()
    {
        $subcategories = auth()->user()->isSuperAdmin()
        ? Subcategory::with('category')->get()
        : Subcategory::where('user_id', auth()->id())->with('category')->get();
        return view('admin.subcategories.index', compact('subcategories'));
    }


    public function create()
    {
        $categories = Category::where('user_id', Auth::id())->get();
        return view('admin.subcategories.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        $data = $request->all();
        $data['user_id'] = auth()->id(); 
    
        if ($request->hasFile('image')) {
           
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('uploads/subcategories'), $imageName);
            $data['image'] = $imageName;
        }
    
        Subcategory::create($data);
    
        return redirect()->route('subcategories.index')->with('success', 'Subcategory added successfully.');
    }
    

    public function edit($id)
    {
        $subcategory = Subcategory::findOrFail($id);

        // Fetch only the logged-in user's categories
        $categories = Category::where('user_id', Auth::id())->get();
        return view('admin.subcategories.create', compact('subcategory', 'categories'));
    }


    public function update(Request $request, $id)
    {
        $subcategory = Subcategory::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();
       

        if ($request->hasFile('image')) {
            // Delete old image
            if ($subcategory->image && file_exists(public_path('uploads/subcategories/' . $subcategory->image))) {
                unlink(public_path('uploads/subcategories/' . $subcategory->image));
            }

            // Upload new image
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('uploads/subcategories'), $imageName);
            $data['image'] = $imageName;
        }

        $subcategory->update($data);

        return redirect()->route('subcategories.index')->with('success', 'Subcategory updated successfully.');
        
    }


    public function destroy($id)
    {
        $subcategory = Subcategory::findOrFail($id);

        if ($subcategory->user_id !== auth()->id() && !auth()->user()->isSuperAdmin()) {
            abort(403); // Unauthorized action
        }
        $subcategory->delete();

        return response()->json(['success' => 'Subcategory deleted successfully.']);
    }

}

