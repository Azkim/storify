<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function(){
    //Route::get('/stories','StoriesController@index')->name('stories.index');
    //Route::get('/stories/{story}','StoriesController@show')->name('stories.show');
    //Route::resource('dash','DashboardController');
    Route::resource('stories','StoriesController');
    Route::get('/user/articles', 'ProfileController@articles')->name('user.articles');
    Route::resource('users','ProfileController');
    Route::post('ckeditor/upload', 'CKEditorController@upload')->name('ckeditor.image-upload');
});
