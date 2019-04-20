<?php

namespace App\Http\Controllers;

use App\RecentlyArticle;
use Illuminate\Http\Request;
use App\ArticleApplication;

class UserController extends Controller
{
    /**
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function showArticles(int $id) {
        return response()->json(ArticleApplication::scopeUserApplicationArticle($id));
    }

    public function showRecentlyArticles(int $id) {
        return response()->json(RecentlyArticle::scopeUserRecentlyArticles($id));
    }

}
