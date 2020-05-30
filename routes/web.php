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
    return view('website.frontend.layouts.main');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Route::get('/dashboard', function () {
//     return view('website.backend.layouts.main');
// });

Route::get('/dashboard', 'BackendController@index')->name('backend.index');

Route::resource('/dashboard/productcategory','ProductCategoryController');

Route::resource('/dashboard/document','DocumentController');

