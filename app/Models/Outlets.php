<?php

namespace App\Models;

use App\Models\Sales;
use App\Models\Shifts;
use App\Models\Returns;
use App\Models\Products;
use App\Models\Purchases;
use App\Models\WarehouseTransfers;
use Illuminate\Database\Eloquent\Model;

class Outlets extends Model
{
    protected $table = 'outlets';

    protected $fillable = [
        'name',
        'address',
        'phone',
        'email',
        'status',
        //timestamps 
    ];

    public function purchase()
    {
        return $this->hasMany(Purchases::class, 'outlet_id');
    }

    public function warehouse_transfer()
    {
        return $this->hasMany(WarehouseTransfers::class, 'outlet_id');
    }

    public function return()
    {
        return $this->hasMany(Returns::class, 'outlet_id');
    }
    
    public function sale()
    {
        return $this->hasMany(Sales::class, 'outlet_id');
    }

    public function shift()
    {
        return $this->hasMany(Shifts::class, 'outlet_id');
    }

    public function product()
    {
        return $this->hasMany(Products::class, 'outlet_id');
    }
}
