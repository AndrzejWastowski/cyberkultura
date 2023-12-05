<?php

// app/Models/ProductsPricing.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductsPricing extends Model
{
    use HasFactory;

    protected $table = 'products_prices';

    protected $fillable = ['min_quantity', 'max_quantity', 'price_per_unit'];

    public function products()
    {
        return $this->belongsTo(Product::class);
    }
}
