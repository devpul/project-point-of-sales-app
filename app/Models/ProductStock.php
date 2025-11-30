<?php

namespace App\Models;

use App\Models\Stock;
use App\Models\Products;
use Illuminate\Database\Eloquent\Model;

class ProductStock extends Model
{
    protected $table = 'product_stocks';

    protected $fillable = [
        'product_id',
        'stock_id',
        'qty',
        //timestamps
    ];

    public function product()
    {
        return $this->belongsTo(Products::class, 'product_id');
    }

    public function stock()
    {
        return $this->belongsTo(Stock::class, 'stock_id');
    }
}
