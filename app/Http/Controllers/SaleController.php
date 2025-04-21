<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sale;
use Illuminate\Support\Facades\Auth;

class SaleController extends Controller
{



    public function index()
    {
        $sales = Sale::with('product')->get();
        return view('admin.sales.index', compact('sales'));
    }
}
