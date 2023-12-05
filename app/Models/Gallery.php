<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;
    protected $table = 'gallery';
    protected $fillable = ['id','name',  'category_id', 'user_id'];
    public function categories()
    {
        return $this->belongsTo(GalleryCategory::class, 'gallery_category_id');
    }
}
