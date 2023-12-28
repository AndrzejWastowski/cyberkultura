<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;
    protected $table = 'offers';
    protected $fillable = [
        'id',
        'top',
        'category_id'
        
    ];


    public function translations()
    {
        return $this->hasMany(OfferTranslation::class, 'offers_id', 'id');
    }

    public function photo()
    {
        return $this->hasMany(OfferPhoto::class,'offers_id','id');
    }

    public function categories()
    {
        return $this->belongsTo(OfferCategory::class,'category_id','id');
    }
    public function comments()
    {
        return $this->hasMany(OfferComment::class,'offers_id','id');
    }

}
