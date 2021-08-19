<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Back\AuthController;






// BACKEND ROUTES

//prefix methodu ile admin url tanımlandı


   Route::prefix('admin')->name('admin.')->middleware('isLogin')->group(function () {

    Route::get('login','Back\AuthController@login')->name('login');
    
    Route::post('login','Back\AuthController@loginPost')->name('login.post');
    
    });
    

 Route::prefix('admin')->name('admin.')->middleware('isAdmin')->group(function () {

 Route::get('panel','Back\Dashboard@index')->name('dashboard');



 // Makale Route'S

 Route::resource('articles','Back\ArticleController');

 Route::get('/switch','Back\ArticleController@switch')->name('switch');

 Route::get('/deletearticle/{id}','Back\ArticleController@delete')->name('delete.article');



 // Kategori Routes's
 
 Route::get('/deletecategory/{id}','Back\CategoryController@delete')->name('delete.category');   

 Route::get('/categories','Back\CategoryController@index')->name('category.index');

 Route::post('/categories/create','Back\CategoryController@create')->name('category.create');
 //


// Sayfa Route's

Route::get('/pages','Back\PageController@index')->name('page.index');

Route::get('/pages/create','Back\PageController@create')->name('page.create');

Route::get('/pages/edit/{id}','Back\PageController@update')->name('page.update');

Route::post('/pages/edit/{id}','Back\PageController@updatePost')->name('page.update.post');

Route::post('/pages/create','Back\PageController@post')->name('page.create.post');

Route::get('/page/delete/{id}','Back\PageController@delete')->name('page.delete');

//

 Route::get('/settings','Back\ConfigController@index')->name('config.index');
 Route::post('/settings/update','Back\ConfigController@update')->name('config.update');


//

 Route::get('logout','Back\AuthController@logout')->name('logout');

});






//FRONTEND ROUTES

Route::get('/', [HomeController::class, 'index'])->name('homepage');

Route::get('/contact','Front\HomeController@contact')->name('contact');

Route::any('/contactPost','Front\HomeController@contactPost')->name('contactpost');

Route::get('/{category}/{slug}/{title}',[HomeController::class,'single'])->name('single');

Route::get('/Kategori/{category}',[HomeController::class,'category'])->name('category');

Route::get('/page/{sayfa}',[HomeController::class,'page'])->name('page');


















