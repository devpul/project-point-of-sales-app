<?php

namespace App\Models;

use App\Models\Users;
use App\Models\Points;
use App\Models\Shifts;
use App\Models\Outlets;
use App\Models\Returns;
use App\Models\Payments;
use App\Models\Customers;
use App\Models\SaleItems;
use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    protected $table = 'sales';

    protected $fillable = [
        'invoice_code',
        'user_id', //fk
        'customer_id', //fk
        'outlet_id', //fk
        'total_amount',
        'discount',
        'method',
        'paid_amount',
        'cash_change',
        'status',
        'shift_id', //fk
        'receipt_method',
        'description',
        //timestamps
    ];

    const UPDATED_AT = null;

    public function sale_item()
    {
        return $this->hasMany(SaleItems::class, 'sale_id');
    }

    public function point()
    {
        return $this->hasOne(Points::class, 'sale_id');
    }

    public function payment()
    {
        return $this->hasOne(Payments::class, 'sale_id');
    }

    public function return()
    {
        return $this->hasMany(Returns::class, 'sale_id');
    }


    // ==================================== belongs to
    public function user()
    {
        return $this->belongsTo(Users::class, 'user_id');
    }

    public function customer()
    {
        return $this->belongsTo(Customers::class, 'customer_id');
    }

    public function outlet()
    {
        return $this->belongsTo(Outlets::class, 'outlet_id');
    }

    public function shift()
    {
        return $this->belongsTo(Shifts::class, 'shift_id');
    }

}
