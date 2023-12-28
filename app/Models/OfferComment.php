<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OfferComment extends Model
{
    protected $table = 'offers_comments';
    protected $fillable = [
       'id','name','offers_id','description','user_id','sort','localization','rating'
    ];


    public function offer()
    {
        return $this->hasMany(Offer::class,'id');
    }
}
