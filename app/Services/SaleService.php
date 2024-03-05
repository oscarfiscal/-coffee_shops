<?php

namespace App\Services;

use App\Http\Requests\SaleRequest;
use App\Models\Product;
use App\Models\Sale;
use Illuminate\Http\Client\Request;

class SaleService
{
    public function __construct(
        private Sale $sale
    ) {
    }
    public function createSale(Product $product, int $quantitySold, SaleRequest|Request $request): Sale
    {
        // Update stock
        $product->stock -= $quantitySold;
        $product->save();

        // Create sale
        $sale =  $this->sale->create($request->all());

        return $sale;
    }
}
