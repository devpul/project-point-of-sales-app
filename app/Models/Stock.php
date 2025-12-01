<?php

namespace App\Models;

use App\Models\Products;
use App\Models\Warehouse;
use App\Models\StockOpname;
use App\Models\WarehouseTransfers;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $table = 'stocks';

    protected $fillable = [
        'name',
        'unit',
        'warehouse_id',
        'created_at', //timestamp
        'updated_at', //timestamp
        'current_stock',
    ];

    public function stock_opname()
    {
        return $this->hasMany(StockOpname::class, 'stock_id');
    }

    public function product()
    {
        return $this->belongsToMany(Products::class, 'product_stocks')
                    ->withPivot('qty')
                    ->withTimestamps();
    }

    public function warehouse()
    {
        return $this->belongsTo(Warehouse::class, 'warehouse_id');
    }
}
