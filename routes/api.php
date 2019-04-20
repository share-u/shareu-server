<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('articles', 'ArticleController@index');
Route::post('articles', 'ArticleController@store');
Route::get('articles/{article_id}', 'ArticleController@show');
Route::post('articles/{article_id}', 'ArticleController@applicationArticle');

Route::get('users/articles/{user_id}', 'UserController@showArticles');

Route::get('talents', 'TalentController@index');
