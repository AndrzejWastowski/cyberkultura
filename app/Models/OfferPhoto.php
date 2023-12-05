<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OfferPhoto extends Model
{
    protected $table = 'offers_photo';
    protected $fillable = [
       'id','name','offers_id','top','user_id','sort','localization'
    ];


    public function news()
    {
        return $this->hasMany(Offer::class,'id');
    }
}
