<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});


Route::get('tinymce', 'GeneralContoller@tinymce')->name('tinymce');
Route::post('tinymce_post', 'GeneralContoller@tinymce_post')->name('tinymce_post');


Route::get('ckeditor', 'GeneralContoller@ckeditor')->name('ckeditor');
Route::post('ckeditor_post', 'GeneralContoller@ckeditor_post')->name('ckeditor_post');

Route::get('summernote', 'GeneralContoller@summernote')->name('summernote');
Route::post('summernote_post', 'GeneralContoller@summernote_post')->name('summernote_post');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
