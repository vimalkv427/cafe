<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = auth()->user()->isSuperAdmin()
        ? Category::all()  // Super admin sees everything
        : Category::where('user_id', auth()->id())->get(); // Fetch latest first
        return view('admin.page_list_category', compact('categories'));
    }
    
    
    public function add()
    {

        return view('admin.page_add_category');
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id); // Fetch category by ID

        return view('admin.page_add_category', compact('category'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required',
            'code' => 'required|unique:categories,code'
        ]);

        Category::create([
            'user_id' => auth()->id(),
            'category_name' => $request->category_name,
            'code' => $request->code
        ]);

        return redirect()->back()->with('success', 'Category added successfully');
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'category_name' => 'required',
            'code' => 'required|unique:categories,code,' . $id, // Ensure unique code except for this ID
        ]);

        $category = Category::findOrFail($id);
        $category->update([
            'category_name' => $request->category_name,
            'code' => $request->code
        ]);

        return redirect()->route('categories.index')->with('success', 'Category updated successfully');
    }
    public function destroy($id)
    {
        $category = Category::findOrFail($id);

        if ($category->user_id !== auth()->id() && !auth()->user()->isSuperAdmin()) {
            abort(403); // Unauthorized action
        }
        
        $category->delete();

        return response()->json(['success' => 'Category deleted successfully.']);
    }
}
