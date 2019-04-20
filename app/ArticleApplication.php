<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArticleApplication extends Model
{
    protected $fillable = ['article_id', 'user_id'];

    static public function scopeUserApplicationArticle(int $id) {
        self::where('user_id', $id)->get();
    }
}
