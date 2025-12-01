<?php

namespace App\Models;

use App\Models\Stock;
use App\Models\Outlets;
use App\Models\SaleItems;
use App\Models\Categories;
use App\Models\ReturnsItems;
use App\Models\ProductImages;
use App\Models\WarehouseTransfers;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table = 'products';

    protected $fillable = [
        'name',
        'category_id', //fk
        'price',
        'image',
        'barcode_number',
        'sku',
        'has_promo',
        'outlet_id', //fk
        'promo_type',
        'promo_amount',
    ];

    public $timestamps = false;

    public function product_image()
    {
        return $this->hasMany(ProductImages::class, 'product_id');
    }

    public function warehouse_transfer()
    {
        return $this->hasMany(WarehouseTransfers::class,'product_id');
    }

    public function sale_item()
    {
        return $this->hasMany(SaleItems::class, 'product_id');
    }

    public function return_item()
    {
        return $this->hasMany(ReturnsItems::class, 'product_id');
    }

    public function stock()
    {
        return $this->belongsToMany(Stock::class, 'product_stocks')
                    ->withPivot('qty')
                    ->withTimestamps();
    }

    public function category()
    {
        return $this->belongsTo(Categories::class, 'category_id');
    }

     public function outlet()
    {
        return $this->belongsTo(Outlets::class, 'outlet_id');
    }
}
