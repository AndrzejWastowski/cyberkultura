<?php

// app/Models/ProductsTranslations.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductsTranslations extends Model
{
    use HasFactory;

    protected $fillable = ['locale', 'name', 'description'];

    public function products()
    {
        return $this->belongsTo(Products::class);
    }
}