<?php

namespace App\Models;

use App\Models\Returns;
use App\Models\Products;
use Illuminate\Database\Eloquent\Model;

class ReturnsItems extends Model
{
    protected $table = 'returns_items';
    
    protected $fillable = [
        'return_id',
        'product_id',
        'unit_price',
        'subtotal',
        'notes',
        'reason',
        // 'created_at',  //timestamp 
        // 'updated_at', //timestamp  
    ];

    public function return()
    {
        return $this->belongsTo(Returns::class, 'return_id');
    }

    public function product()
    {
        return $this->belongsTo(Products::class, 'product_id');
    }
}
