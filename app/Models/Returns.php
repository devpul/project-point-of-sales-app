<?php

namespace App\Models;

use App\Models\Sales;
use App\Models\Users;
use App\Models\Outlets;
use App\Models\ReturnsItems;
use Illuminate\Database\Eloquent\Model;

class Returns extends Model
{
    protected $table = 'returns';

    protected $fillable = [
        'sale_id',
        'reason',
        'total_refund',
        'user_id',
        'outlet_id',
        'status',
        //timestamps
    ];

    public function return_item()
    {
        return $this->hasMany(ReturnsItems::class, 'return_id');
    }

    // ==================================== belongs to
    public function sale()
    {
        return $this->belongsTo(Sales::class, 'sale_id');
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
