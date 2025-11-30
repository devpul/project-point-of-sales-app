<?php

namespace App\Models;

use App\Models\Sales;
use Illuminate\Database\Eloquent\Model;

class Payments extends Model
{
    protected $table = 'payments';

    protected $fillable = [
        'sale_id',
        'method',
        'amount',
        'receipt_method',
        // timestamps
    ];
    
    public function sale()
    {
        return $this->belongsTo(Sales::class, 'sale_id');
    }
}
