<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use app\Models\Teg;

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'title',
        'lead',
        'description',
        'date_publication',
        'news_category_id',
    ];

    protected static function booted()
    {
        static::created(function ($news) {
            $news->category->increment('counter');
        });

        static::updated(function ($news) {
            if ($news->isDirty('news_category_id')) {
                $news->getOriginal('news_category_id');
                NewsCategory::find($news->getOriginal('news_category_id'))->decrement('counter');
                $news->category->increment('counter');
            }
        });

        static::deleted(function ($news) {
            $news->category->decrement('counter');
        });
    }

    public function category()
    {
        return $this->belongsTo(NewsCategory::class, 'news_category_id');
    }

    public function photo()
    {
        return $this->hasMany(NewsPhoto::class,'news_id');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'news_tags', 'news_id', 'tags_id');
    }




}
