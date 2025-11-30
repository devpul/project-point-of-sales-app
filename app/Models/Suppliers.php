<?php

namespace App\Models;

use App\Models\Purchases;
use App\Models\StockOpname;
use Illuminate\Database\Eloquent\Model;

class Suppliers extends Model
{
    protected $table = 'suppliers';

    protected $fillable = [
        'name',
        'phone',
        'email',
        'address',
        'pic_name',
    ];

    public $timestamps = false;

    public function stock_opname()
    {
        return $this->hasMany(StockOpname::class, 'supplier_id');
    }

    public function purchase()
    {
        return $this->hasMany(Purchases::class, 'supplier_id');
    }
}
