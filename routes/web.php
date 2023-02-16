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

use App\Http\Controllers\CommentController;
use App\Image;


// Route::get('/', function () {
//     return view('welcome');
// });



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index')->name('home');


Route::get('/configuracion', 'UserController@config')->name('config');
Route::post('user/edit', 'UserController@update')->name('user.update');
Route::get('user/avatar/{filename}', 'UserController@getImage')->name('user.avatar');
Route::get('subir-imagen', 'ImageController@create')->name('subir-imagen');
Route::post('compartir', 'ImageController@save')->name('compatir');
Route::get('image/compartido/{filename}', 'ImageController@getImage')->name('user.compartido');
Route::get('image/{id}', 'ImageController@detalle')->name('image.detail');
Route::post('comentario/save', 'CommentController@store')->name('comentario.guardar'); 

Route::get('/comment/delete/{id}','CommentController@delete')->name('comentario.eliminar');

