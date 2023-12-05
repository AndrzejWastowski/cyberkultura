<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GalleryCategory extends Model
{
    protected $table = 'gallery_category';
    protected $fillable = [
        'name',
        'filtr'
    ];

    public function gallery()
    {
        return $this->hasMany(Gallery::class, 'gallery_category_id');
    }
}
