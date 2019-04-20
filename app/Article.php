<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = ['user_id', 'title', 'content', 'image_url', 'address'];

    static public function scopeGetArticles() {
        return self::whereNull('withdraw_at')->get();
    }

    static public function scopeShowArticles(int $id) {
        return self::where('id', $id)->get();
    }
}
