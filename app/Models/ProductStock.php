<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductStock extends Model
{
    use HasFactory;

    protected $table = 'product_stocks';
    protected $fillable = [
        'product_id',
        'added_stock',
        'stock_date',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
