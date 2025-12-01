<?php

namespace App\Models;

use App\Models\Products;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $table = 'categories';

    protected $fillable = [
        'name',
        'created_at',  //timestamp  
    ];
    
    const UPDATED_AT = null;
    
    public function product()
    {
        return $this->hasMany(Products::class, 'category_id');
    }
}
