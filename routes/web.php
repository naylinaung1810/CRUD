<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[
    'uses'=>'homeController@getWelcome',
    'as'=>'/'
]);

Route::post('/post/new',[
    'uses'=>'homeController@newPost',
    'as'=>'post.new'
    ]);

Route::get('/post/id/{id}/delete',[
   'uses'=>'homeController@deletePost',
   'as'=>'post.delete'
]);

Route::get('/post/id/{id}/edit',[
    'uses'=>'homeController@editPost',
    'as'=>'post.edit'
]);

Route::post('/post/update',[
    'uses'=>'homeController@postUpsdate',
    'as'=>'post.update'
]);

Route::get('post/search',[
    'uses'=>'homeController@searchPost',
    'as'=>'post.search'
]);