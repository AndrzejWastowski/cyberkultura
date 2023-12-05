<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NewsCategory extends Model
{
    protected $table = 'news_category';
    protected $fillable = [
        'id',
        'name',
        'counter'
    ];

    public function news()
    {
        return $this->hasMany(News::class, 'news_category_id');
    }

}
