<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\CustomLoginController;
use App\Http\Controllers\Auth\CustomRegistrationController;
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
})->name('home.page');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Auth Routes
Route::get('/user/register', [CustomRegistrationController::class, 'register'])->name('user.register');
Route::post ('/user/save', [CustomRegistrationController::class, 'save'])->name('user.save');
Route::get('/login', [CustomLoginController::class, 'create'])
                ->middleware('guest')
                ->name('login');
Route::post('/login', [CustomLoginController::class, 'store'])
                ->middleware('guest');

Route::middleware(['auth'])->group(function(){
    Route::resource('stories','StoriesController');
    Route::get('/user/articles', 'ProfileController@articles')->name('user.articles');
    Route::resource('users','ProfileController');
    Route::post('ckeditor/upload', 'CKEditorController@upload')->name('ckeditor.image-upload');
});
