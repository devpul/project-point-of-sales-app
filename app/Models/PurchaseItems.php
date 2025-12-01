<?php

namespace App\Models;

use App\Models\Products;
use App\Models\Purchases;
use Illuminate\Database\Eloquent\Model;

class PurchaseItems extends Model
{
    protected $table = 'purchase_items';

    protected $fillable = [
        'purchase_id',
        'product_id',
        'quantity',
        'cost_price',
        'subtotal',
        // 'created_at',  //timestamp 
        // 'updated_at', //timestamp  
    ]; 

    public function purchase()
    {
        return $this->belongsTo(Purchases::class, 'purchase_id');
    }

    public function product()
    {
        return $this->belongsTo(Products::class, 'product_id');
    }
}
