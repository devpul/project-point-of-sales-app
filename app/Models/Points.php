<?php

namespace App\Models;

use App\Models\Sales;
use App\Models\Customers;
use Illuminate\Database\Eloquent\Model;

class Points extends Model
{
    protected $table = 'points';

    protected $fillable = [
        'customer_id',
        'sale_id',
        'point',
        'type',
        'description',
        // 'created_at', //timestamp
    ]; 

    const UPDATED_AT = null;

    public function customer()
    {
        return $this->belongsTo(Customers::class, 'customer_id');
    }

    public function sale()
    {
        return $this->belongsTo(Sales::class, 'sale_id');
    }
}
