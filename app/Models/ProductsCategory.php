<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductsCategory extends Model
{

    protected $table = 'products_category';
    public $timestamps = false;

    public function products()
    {
        return $this->belongsToMany(Products::class, 'products_category_to_product', 'products_category_id', 'products_id');
    }

    public function translations_all()
    {
        return $this->hasMany(ProductsCategoryTranslation::class);

    }

    public function translation_name()
    {
        return $this->hasMany(ProductsCategoryTranslation::class)->where('locale', app()->getLocale());

    }

    public function translations_locale()
    {
        return $this->hasMany(ProductsCategoryTranslation::class)->where('locale', app()->getLocale());
    }
}