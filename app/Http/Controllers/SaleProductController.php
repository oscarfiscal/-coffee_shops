<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaleRequest;
use App\Models\Product;
use App\Models\Sale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class SaleProductController extends Controller
{
    public function __construct(
        private Sale $sale
    ) {
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = Product::all();
        return view('sale.saleProduct', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SaleRequest $request)
    {


        $productId = $request->input('product_id');
        $product = Product::findOrFail($productId);

        $quantitySold = $request->input('quantity');

        // Check if there's enough stock
        if ($product->stock < $quantitySold) {
            return Redirect::back()->with('error', 'No hay suficiente stock disponible para esta venta.');
        }

        // Update stock
        $product->stock -= $quantitySold;
        $product->save();

        $this->sale->create($request->all());
        return redirect()->route('products.index')->with('success', '¡La venta se ha realizado con éxito!');
    }
}
