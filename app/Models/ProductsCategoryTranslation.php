<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductsCategoryTranslation extends Model
{
    use HasFactory;
    protected $fillable = ['locale', 'name' ,'link'];

    public function producsCategory()
    {
        return $this->belongsTo(ProductsCategory::class);
    }
}
