<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductsAttributes extends Model
{
    use HasFactory;
    protected $fillable = ['products_id', 'attribute_name', 'attribute_value'];

    public function product()
    {
        return $this->belongsTo(Products::class);
    }
}
