<?php

namespace App\Models;

use App\Models\Users;
use App\Models\Outlets;
use App\Models\Suppliers;
use App\Models\PurchaseItems;
use Illuminate\Database\Eloquent\Model;

class Purchases extends Model
{
    protected $table = 'purchases';

    protected $fillable = [
        'supplier_id',
        'user_id',
        'outlet_id',
        'cost_price',
        'total_amount',
        //timestamps  
    ];

    
    public function purchase_item()
    {
        return $this->hasMany(PurchaseItems::class, 'purchase_id');
    }

    public function supplier()
    {
        return $this->belongsTo(Suppliers::class, 'supplier_id');
    }

    public function user()
    {
        return $this->belongsTo(Users::class, 'user_id');
    }

    public function outlet()
    {
        return $this->belongsTo(Outlets::class, 'outlet_id');
    }
}
