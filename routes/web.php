<?php

use Illuminate\Support\Facades\Auth;
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

Route::group(['namespace' => 'App\Http\Controllers\Main'], function () {
    Route::get('/', 'IndexController');
});

Route::group(['namespace' => 'App\Http\Controllers\Admin\Main', 'prefix' => 'admin'], function () {
    Route::get('/', 'IndexController');
});

Route::group(['namespace' => 'App\Http\Controllers\Admin\Category', 'prefix' => 'admin/categories'], function () {
    Route::get   ('/', 'IndexController')              ->name('admin.category.index');
    Route::get   ('/create', 'CreateController')       ->name('admin.category.create');
    Route::post  ('/', 'StoreController')              ->name('admin.category.store');
    Route::get   ('/{category}', 'ShowController')     ->name('admin.category.show');
    Route::get   ('/{category}/edit', 'EditController')->name('admin.category.edit');
    Route::patch ('/{category}', 'UpdateController')   ->name('admin.category.update');
    Route::delete('/{category}', 'DeleteController')   ->name('admin.category.delete');
});

Route::group(['namespace' => 'App\Http\Controllers\Admin\Tag', 'prefix' => 'admin/tags'], function () {
    Route::get   ('/', 'IndexController')         ->name('admin.tag.index');
    Route::get   ('/create', 'CreateController')  ->name('admin.tag.create');
    Route::post  ('/', 'StoreController')         ->name('admin.tag.store');
    Route::get   ('/{tag}', 'ShowController')     ->name('admin.tag.show');
    Route::get   ('/{tag}/edit', 'EditController')->name('admin.tag.edit');
    Route::patch ('/{tag}', 'UpdateController')   ->name('admin.tag.update');
    Route::delete('/{tag}', 'DeleteController')   ->name('admin.tag.delete');
});

Route::group(['namespace' => 'App\Http\Controllers\Admin\Post', 'prefix' => 'admin/posts'], function () {
    Route::get   ('/', 'IndexController')          ->name('admin.post.index');
    Route::get   ('/create', 'CreateController')   ->name('admin.post.create');
    Route::post  ('/', 'StoreController')          ->name('admin.post.store');
    Route::get   ('/{post}', 'ShowController')     ->name('admin.post.show');
    Route::get   ('/{post}/edit', 'EditController')->name('admin.post.edit');
    Route::patch ('/{post}', 'UpdateController')   ->name('admin.post.update');
    Route::delete('/{post}', 'DeleteController')   ->name('admin.post.delete');
});

Route::group(['namespace' => 'App\Http\Controllers\Admin\User', 'prefix' => 'admin/users'], function () {
    Route::get   ('/', 'IndexController')          ->name('admin.user.index');
    Route::get   ('/create', 'CreateController')   ->name('admin.user.create');
    Route::post  ('/', 'StoreController')          ->name('admin.user.store');
    Route::get   ('/{user}', 'ShowController')     ->name('admin.user.show');
    Route::get   ('/{user}/edit', 'EditController')->name('admin.user.edit');
    Route::patch ('/{user}', 'UpdateController')   ->name('admin.user.update');
    Route::delete('/{user}', 'DeleteController')   ->name('admin.user.delete');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
