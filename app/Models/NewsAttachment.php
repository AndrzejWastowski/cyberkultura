<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NewsAttachment extends Model
{
    protected $fillable = [
        'id','news_id', 'description'
    ];

    public function news()
    {
        return $this->belongsTo(News::class);
    }
}
