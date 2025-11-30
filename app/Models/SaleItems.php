<?php

namespace App\Models;

use App\Models\Sales;
use App\Models\Products;
use Illuminate\Database\Eloquent\Model;

class SaleItems extends Model
{
    protected $table = 'sale_items';
    
    protected $fillable = [
        'sale_id',
        'product_id',
        'qty',
        'price',
        'total',
    ];

    public $timestamps = false;

    public function sale()
    {
        return $this->belongsTo(Sales::class, 'sale_id');
    }

    public function product()
    {
        return $this->belongsTo(Products::class, 'product_id');
    }
}
