<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OfferCategory extends Model
{
    protected $table = 'offers_category';
    protected $fillable = [
        'name',
        'filtr'
    ];

    public function offer()
    {
        return $this->hasMany(Offer::class, 'category_id');
    }
}
