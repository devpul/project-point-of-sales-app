<?php

namespace App\Models;

use App\Models\Stock;
use App\Models\WarehouseTransfers;
use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    protected $table = 'warehouses';

    protected $fillable = [
        'name',
        'code',
        'address',
        'city',
        'province',
        'contact_person',
        'phone',
        'email',
        'is_active',
        'notes',
        // 'created_at',  //timestamp 
        // 'updated_at', //timestamp  
    ];

    public function stock()
    {
        return $this->hasMany(Stock::class, 'warehouse_id');
    }

    public function warehouse_transfer()
    {
        return $this->hasMany(WarehouseTransfers::class, 'warehouse_id');
    }
}
