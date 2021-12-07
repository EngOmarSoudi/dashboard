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
Auth::routes();




Route::prefix('auth')->group(function(){
    Route::get('init' , 'App\Http\Controllers\AutheintacitonController@init');
    Route::post('login' , 'App\Http\Controllers\AutheintacitonController@login');
    Route::post('logout' , 'App\Http\Controllers\AutheintacitonController@logout');
});


 // Admin Routes

 Route::group(['middleware' => ['auth'] ], function () {
    Route::get('/admin', 'App\Http\Controllers\Admin\HomeController@index');
    Route::get('/admin/{any}', 'App\Http\Controllers\Admin\HomeController@index')->where('any', '.*');
});







// User Routes
Route::get('/', 'App\Http\Controllers\HomeController@index');
Route::get('/{any}', 'App\Http\Controllers\HomeController@index')->where('any', '.*');


