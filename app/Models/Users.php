<?php

namespace App\Models;

use App\Models\Sales;
use App\Models\Shifts;
use App\Models\Purchases;
use App\Models\StockOpname;
use App\Models\ActivityLogs;
use App\Models\WarehouseTransfers;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Users extends Authenticatable
{
    use Notifiable;

    protected $table = 'users';

    protected $fillable = [
        'name',
        'phone',
        'email',
        'password',
        'role',
        'registered_at', //timestamp
        'updated_at', //timestamp
        'status',
    ];

    const CREATED_AT = null;

    public function product()
    {
        return $this->hasMany(Products::class, 'product_id');
    }
    

    public function stock_opname()
    {
        return $this->hasMany(StockOpname::class, 'user_id');
    }

    public function warehouse_transfer()
    {
        return $this->hasMany(WarehouseTransfers::class, 'user_id');
    }

    // user has many logs
    public function activity_logs()
    {
        return $this->hasMany(ActivityLogs::class, 'user_id');
    }

    // UNUSED: user has many sales
    public function sale()
    {
        return $this->hasMany(Sales::class, 'user_id');
    }

    public function shift()
    {
        return $this->hasMany(Shifts::class, 'user_id');
    }

    public function purchase()
    {
        return $this->hasMany(Purchases::class, 'purchase_id');
    }
}
