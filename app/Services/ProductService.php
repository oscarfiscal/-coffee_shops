<?php

namespace App\Services;

use App\Models\Product;
use App\Models\Sale;
use Illuminate\Support\Facades\DB;

class ProductService
{
    public function getProductWithMaxStock()
    {
        return Product::select('id', 'name', 'stock')
            ->orderByDesc('stock')
            ->first();
    }

    public function getProductWithMaxSales()
    {
        return Sale::select('product_id', DB::raw('COUNT(*) as total_sales'))
            ->groupBy('product_id')
            ->orderByDesc('total_sales')
            ->first();
    }
}
