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

    ];


    public function translations()
    {
        return $this->hasMany(OfferTranslation::class, 'offers_id', 'id');
    }

    public function photo()
    {
        return $this->hasMany(OfferPhoto::class,'offers_id','id');
    }

}
