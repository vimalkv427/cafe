<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function index()
    {

        return view('website.index');
    }


    public function menu()
    {
        $categories = DB::table('categories')->get();
        $products = DB::table('products')->get();
        
        return view('website.menu', compact('categories', 'products'));
    }
    
    public function gallery()
    {
        return view('website.gallery');
    }

    public function contact()
    {
        return view('website.contact');
    }

    public function about()
    {
        return view('website.about');
    }
}
