<?php

namespace App\Models;

use App\Models\Sales;
use App\Models\Points;
use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    protected $table = 'customers';

    protected $fillable = [
        'name',
        'status',
        'email',
        'phone',
        'address'
    ];

    public $timestamps = false;
    
    public function point()
    {
        return $this->hasMany(Points::class, 'customer_id');
    }

    public function sale()
    {
        return $this->hasMany(Sales::class, 'customer_id');
    }
    
}
