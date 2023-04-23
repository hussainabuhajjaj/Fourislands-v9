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

use Illuminate\Support\Facades\Auth;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Http\Controllers\Front\FrontController;
Route::get('image/{folder}/{path}/{size?}', 'MediaController@photo');
Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' =>
    ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']], function () {

    Route::group(['namespace' => 'App\Http\Controllers\Front', 'as' => 'home.'], function () {


        Route::get('/', 'FrontController@home')->name('home');
        Route::get('notification', 'FrontController@notification');

        Route::get('/about', 'AboutController@Index');

        Route::group(['prefix' => 'services', 'as' => 'services.'], function () {
            Route::get('/', ['as' => 'index', 'uses' => 'ServiceController@index']);
            Route::get('{id}/services', ['as' => 'show', 'uses' => 'ServiceController@show']);

//            Route::get('{id}','ServiceController@show');
//            Route::get('{id}/service', ['as' => 'show', 'uses' => 'ServiceController@show']);
        });
        Route::group(['prefix' => 'products', 'as' => 'products.'], function () {
            Route::get('/', ['as' => 'index', 'uses' => 'ProductController@index']);
            Route::get('{id}/products', ['as' => 'show', 'uses' => 'ProductController@show']);

//            Route::get('{id}','ServiceController@show');
//            Route::get('{id}/service', ['as' => 'show', 'uses' => 'ServiceController@show']);
        });

        Route::group(['prefix' => 'contacts', 'as' => 'contacts.'], function () {
            Route::get('/', ['as' => 'index', 'uses' => 'ContactController@index']);
//            Route::get('contact', 'ContactController@Index');
            Route::post('/', ['as' => 'store', 'uses' => 'ContactController@store']);
        });

    });


});

