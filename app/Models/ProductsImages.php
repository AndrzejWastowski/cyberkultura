<?php
// app/Models/Product.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductsImages extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description'];
    protected $table = 'products_images';

    // Dodaj inne pola, które chcesz przechowywać dla cennika

    public function products()
    {
        return $this->belongsTo(Products::class);
    }
}
