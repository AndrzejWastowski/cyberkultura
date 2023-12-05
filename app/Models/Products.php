<?php

// app/Models/Products.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    protected $table = 'products';

    protected $fillable = ['products_id','sku', 'price'];

    public function translations()
    {
        return $this->hasMany(ProductsTranslations::class);
    }

    public function translations_locale()
    {
        return $this->hasMany(ProductsTranslations::class)->where('locale', app()->getLocale());
    }

    public function pricing()
    {
        return $this->hasMany(ProductsPricing::class);
    }

    public function images()
    {
        //return $this->hasMany(ProductsImage::class);
        return $this->hasMany(ProductsImages::class, 'products_id');
    }

    public function categories()
    {
         return $this->belongsToMany(ProductsCategory::class, 'products_category_to_product', 'products_id', 'products_category_id')
         ->withTimestamps();
    }

    public function attributes()
{
    return $this->hasMany(ProductsAttributes::class);
}
}