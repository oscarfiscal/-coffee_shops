<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaleRequest;
use App\Models\Product;
use App\Models\Sale;
use App\Services\SaleService;
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
    public function store(SaleRequest $request, SaleService $saleService)
    {


        $productId = $request->input('product_id');
        $product = Product::findOrFail($productId);
        $quantitySold = $request->input('quantity');

        // Check if there's enough stock
        if ($product->stock < $quantitySold) {
            return Redirect::back()->with('error', 'No hay suficiente stock disponible para esta venta.');
        }

        $saleService->createSale($product, $quantitySold,$request);
        return redirect()->route('products.index')->with('success', '¡La venta se ha realizado con éxito!');
    }
}
