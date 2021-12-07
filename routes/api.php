<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Admin API Routes
Route::resource('updateProfile' , 'App\Http\Controllers\ProfileController');

Route::put('changePassword/{user}' , 'App\Http\Controllers\ProfileController@changepassword');

Route::resource('users' , 'App\Http\Controllers\UserController');

Route::resource('imageslide' , 'App\Http\Controllers\ImageSlideController');
Route::put('imageSlideIsDisplay/{imageslide}' , 'App\Http\Controllers\ImageSlideController@isdisplay');

Route::resource('aboutUs' , 'App\Http\Controllers\AboutUsController');

Route::resource('branches' , 'App\Http\Controllers\BranchController');


Route::resource('news' , 'App\Http\Controllers\NewsController');


Route::resource('agencies' , 'App\Http\Controllers\AgenciesController');

Route::resource('partnership' , 'App\Http\Controllers\PartnershipController');

Route::resource('contact_information' , 'App\Http\Controllers\ContactController');

Route::resource('gallery' , 'App\Http\Controllers\GalleryController');

Route::resource('sections' , 'App\Http\Controllers\SectionsController');
Route::resource('subsections' , 'App\Http\Controllers\SubSectionsController');
Route::resource('subsectionssub' , 'App\Http\Controllers\SubSectionsSubController');
Route::resource('products' , 'App\Http\Controllers\ProductsController');
Route::get('last-products' , 'App\Http\Controllers\ProductsController@last_products');


Route::resource('agriculture_categories' , 'App\Http\Controllers\Admin\API\AgricultureCategoriesController');
Route::resource('agriculture' , 'App\Http\Controllers\Admin\API\AgricultureController');

Route::resource('food_categories' , 'App\Http\Controllers\Admin\API\FoodCategoriesController');
Route::resource('food' , 'App\Http\Controllers\Admin\API\FoodController');


Route::resource('renewable_categories' , 'App\Http\Controllers\Admin\API\RenewableCategoriesController');
Route::resource('renewable' , 'App\Http\Controllers\Admin\API\RenewableController');


Route::resource('others_categories' , 'App\Http\Controllers\Admin\API\OthersCategoriesController');
Route::resource('others' , 'App\Http\Controllers\Admin\API\OthersController');








// Website API Routes
Route::resource('webSiteImageslide' , 'App\Http\Controllers\API\ImageSlideController');
Route::resource('webSiteAboutUs' , 'App\Http\Controllers\API\AboutUsController');
Route::resource('webSiteNews' , 'App\Http\Controllers\API\NewsController');
Route::resource('webSiteGallery' , 'App\Http\Controllers\API\GalleryController');
Route::resource('webSiteAgencies' , 'App\Http\Controllers\API\AgenciesController');
Route::resource('webSitePartnership' , 'App\Http\Controllers\API\PartnershipController');
Route::resource('webSiteAgriculture' , 'App\Http\Controllers\API\AgricultureController');
Route::resource('webSiteFood' , 'App\Http\Controllers\API\FoodController');
Route::resource('webSiteRenewable' , 'App\Http\Controllers\API\RenewableController');
Route::resource('webSiteOthers' , 'App\Http\Controllers\API\OthersController');
Route::get('webSiteProducts' , 'App\Http\Controllers\API\AgricultureController@products');
// Route::get('webSiteProducts/{cat}/{product}' , 'App\Http\Controllers\API\AgricultureController@show_products');
Route::get('webSiteSections' , 'App\Http\Controllers\Admin\API\SectionsController@navSections');


Route::resource('contect' , 'App\Http\Controllers\API\ContectController');
