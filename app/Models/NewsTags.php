<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NewsTags extends Model
{
    protected $table = 'news_tags';
    public $timestamps = false;
    protected $fillable = [
       'id','tags_id','news_id'
    ];


    public function news()
    {
        return $this->hasMany(News::class,'id');
    }
    public function tags()
    {
        return $this->hasMany(Tag::class,'id');
    }
}
