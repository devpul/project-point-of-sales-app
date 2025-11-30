<?php

namespace App\Models;

use App\Models\Stock;
use App\Models\Users;
use App\Models\Suppliers;
use Illuminate\Database\Eloquent\Model;

class StockOpname extends Model
{
    protected $table = 'stock_opnames';

    protected $fillable = [
        'opname_date', //timestamp
        'supplier_id', //fk
        'user_id', //fk
        'quantity',
        'notes',
        'mode',
        'stock_id', //fk
    ];
    
    public $timestamps = false;

    public function supplier()
    {
        return $this->belongsTo(Suppliers::class, 'supplier_id');
    }

    public function user()
    {
        return $this->belongsTo(Users::class, 'user_id');
    }

    public function stock()
    {
        return $this->belongsTo(Stock::class, 'stock_id');
    }
}
