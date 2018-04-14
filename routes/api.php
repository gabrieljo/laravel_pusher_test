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

Route::group([
    'prefix' => 'auth'

], function () {

    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('payload', 'AuthController@payload');
    Route::post('me', 'AuthController@me');

    Route::post('signup', 'AuthController@signup');
});

//Route::apiResource('/questions', 'QuestionController');
Route::get('/questions', 'QuestionController@index');
Route::post('/questions', 'QuestionController@store');
Route::patch('/questions/{question}', 'QuestionController@update');
Route::get('/questions/{question}', 'QuestionController@show');
Route::delete('/questions/{question}', 'QuestionController@destroy');


Route::apiResource('/categories', 'CategoryController');
Route::apiResource('/question/{question}/replies', 'ReplyController');

Route::post('likes/{reply}/', 'LikeController@like');
Route::delete('likes/{reply}/', 'LikeController@unLike');