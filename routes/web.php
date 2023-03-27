<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProjectGalleryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MainController;
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

Auth::routes();

Route::get('/', [HomeController::class, 'home'])->name('home');


Route::delete('admin/projects/{project_id}/media/{media_id}', [ProjectGalleryController::class, 'removeGalleryItem']);

Route::group(['prefix'=>'admin', 'namespace'=>'Admin', 'middleware'=>['auth']], static function(){
    Route::get('/', [DashboardController::class, 'dashboard'])->name('admin.index');
    Route::resource('category', '\App\Http\Controllers\Admin\CategoryController', ['as'=>'admin']);
    Route::resource('project', '\App\Http\Controllers\Admin\ProjectController', ['as'=>'admin']);
    Route::resource('service', '\App\Http\Controllers\Admin\ServiceController', ['as'=>'admin']);
    Route::resource('user', '\App\Http\Controllers\Admin\UserController', ['as'=>'admin']);
    Route::resource('media', '\App\Http\Controllers\Admin\MediaController', ['as'=>'admin']);
    Route::resource('projects.images', '\App\Http\Controllers\Admin\ProjectImageController', ['as'=>'admin']);
});

Route::get('/projects', [MainController::class, 'actionGetProjectList']);
Route::get('/projects/{slug}', [MainController::class, 'actionGetProjectItem']);

Route::get('/categories', [HomeController::class, 'getCategories']);
Route::get('/categories/{category}', [MainController::class, 'actionGetSubCategoryList']);
Route::get('/services/{subCategory}', [MainController::class, 'actionGetServiceList']);
Route::get('/services/{subCategory}/{slug}', [MainController::class, 'actionGetServiceItem']);

Route::get('/contact', static function () {
    return view('pages.contact');
});
Route::get('/about', static function () {
    return view('pages.about');
});
Route::get('/blog', static function () {
    return view('pages.blog');
});
