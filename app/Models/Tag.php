<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    protected $table = 'tags';
    public $timestamps = false;
    protected $fillable = [
        'name',
           ];

    public function offers()
    {
        return $this->belongsToMany(Offer::class, 'offer_tags', 'tags_id', 'offer_id');

    }

    public function news()
    {
        return $this->belongsToMany(News::class, 'news_tags', 'tags_id', 'news_id');
    }
}