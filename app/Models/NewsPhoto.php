<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NewsPhoto extends Model
{
    protected $table = 'news_photo';
    protected $fillable = [
       'id','name','news_id','description','top','user_id','sort'
    ];


    public function news()
    {
        return $this->hasMany(News::class,'id');
    }
}
