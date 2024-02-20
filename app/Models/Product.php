<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

   protected $fillable = [
        'name',
        'reference',
        'price',
        'weight',
        'category',
        'stock',
        'created_at',
    ];

    protected $casts = [
        'price' => 'integer',
        'weight' => 'integer',
        'stock' => 'integer',
        'created_at' => 'date',
    ];
}
