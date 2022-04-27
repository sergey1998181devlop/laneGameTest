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
Route::group(['middleware' => ['auth']], function()
{

    Route::get('/', function () {
        return view('welcome');
    });
    Route::group(['namespace' => '\App\Http\Controllers\Blog' , 'prefix' => 'blog'] , function (){
        Route::resource('news', 'NewsController')->names('blog.news');
    });

    $groupData = [
        'namespace' => '\App\Http\Controllers\Blog',
        'prefix' => 'admin/blog'
    ];
    Route::group($groupData , function (){
        //BlogCategory
        $methods = ['index' , 'edit' , 'store' , 'update' , 'create'];
        Route::resource('categories' , 'CategoryController')
            ->only($methods)
            ->names('blog.admin.categories');

        //BlogPost
        Route::resource('news' , 'NewsController')
            ->except(['show'])
            ->names('blog.admin.news');
    });


    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


});
Auth::routes();
