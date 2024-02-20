<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class SellProductController extends Controller
{
    public function showView()
    {
        $products = Product::all();
        return view('sell.sellProduct',compact('products'));
    }
}
