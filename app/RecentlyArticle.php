<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RecentlyArticle extends Model
{
    protected $fillable = ['user_id', 'article_id'];

    static public function scopeUserRecentlyArticles(int $id) {
        return self::where('user_id', $id)->get();
    }
}
