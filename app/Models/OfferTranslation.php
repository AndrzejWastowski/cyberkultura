<?php

// app/Models/ProductsTranslations.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfferTranslation extends Model
{
    use HasFactory;
    protected $table = 'offers_translations';
    protected $fillable = [
        'name',
        'lead',
        'offers_id',
        'locale',
        'short_description',
        'description'];

    public function offers()
    {
        return $this->belongsTo(Offer::class, 'offers_id');
    }
}