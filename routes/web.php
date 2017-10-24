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

Route::get('/', 'TagsController@index')->name('home');
// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', 'TagsController@index')->name('home');
Route::resource('listpeople','ListPersonController');
Route::resource('detaillist','DetailListController');
Route::resource('medias','MediaController');
Route::resource('tags','TagsController');
Route::get('/detaillist/createid/{id}', 'DetailListController@createid')->name('detaillist.create.id');


// Route::resource('list','ListPersonController');