<?php

namespace App\Models;

use App\Models\Users;
use App\Models\Outlets;
use App\Models\Products;
use App\Models\Warehouse;
use Illuminate\Database\Eloquent\Model;

class WarehouseTransfers extends Model
{
    protected $table = 'warehouse_transfers';

    protected $fillable = [
        'warehouse_id',
        'outlet_id',
        'product_id',
        'user_id',
        'qty',
        'transfer_date', //timestamp
        // 'created_at',  //timestamp 
        // 'updated_at', //timestamp  
    ];

    public function warehouse()
    {
        return $this->belongsTo(Warehouse::class, 'warehouse_id');
    }

    public function outlet()
    {
        return $this->belongsTo(Outlets::class, 'outlet_id');
    }
    public function product()
    {
        return $this->belongsTo(Products::class, 'product_id');
    }
    public function user()
    {
        return $this->belongsTo(Users::class, 'user_id');
    }
}
