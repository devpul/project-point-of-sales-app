<?php

namespace App\Models;

use App\Models\Sales;
use App\Models\Users;
use App\Models\Outlets;
use Illuminate\Database\Eloquent\Model;

class Shifts extends Model
{
    protected $table = 'shifts';
    
    protected $fillable = [
        'user_id',
        'outlet_id',
        'start_time',//timestamp
        'end_time',//timestamp
        'cash_in',
        'cash_out',
        'cashier_name',
    ];

    public $timestamps = false;

    public function sale()
    {
        return $this->hasMany(Sales::class, 'shift_id');
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
