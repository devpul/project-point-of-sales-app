<?php

namespace App\Models;

use App\Models\Products;
use Illuminate\Database\Eloquent\Model;

class ProductImages extends Model
{
    protected $table = 'product_images';

    protected $fillable = [
        'product_id',
        'filename',
    ];

    public $timestamps = false;

    public function product()
    {
        $this->belongsTo(Products::class, 'product_id');
    }
}
