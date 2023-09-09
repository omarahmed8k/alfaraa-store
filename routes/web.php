<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use RealRashid\SweetAlert\Facades\Alert;


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

Route::group(['prefix' => LaravelLocalization::setLocale()], function() {

	Route::get('/', 'App\Http\Controllers\Front\HomeController@index')->name('veiwhome');

	Route::get('/products', 'App\Http\Controllers\Front\ProductController@index')->name('front-product');
	Route::get('/product/{id}', 'App\Http\Controllers\Front\ProductController@show')->name('front-show-product');
	Route::get('/faq', 'App\Http\Controllers\Front\QuestionController@index')->name('front-faq');
	Route::get('/categories', 'App\Http\Controllers\Front\CategoryController@index')->name('front-category');
	Route::get('/category/{id}', 'App\Http\Controllers\Front\CategoryController@show')->name('front-show-category');

	Route::get('/contacts', 'App\Http\Controllers\Front\ContatController@index')->name('front-contact');
	// Route::get('/contact/create', 'App\Http\Controllers\Front\ContatController@create')->name('front-create-contact');
	Route::post('/contact/store', 'App\Http\Controllers\Front\ContatController@store')->name('front-store-contact');
	Route::post('/inactive/store', 'App\Http\Controllers\InactiveController@store')->name('front-store-inactive');

	/** ADD ALL LOCALIZED ROUTES INSIDE THIS GROUP **/

});

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function (){

	Route::get('/products', 'App\Http\Controllers\ProductController@index')->name('veiwproduct');
	// Route::get('/producty', 'App\Http\Controllers\ProductController@indexy')->name('veiwproducty');
	Route::get('/product/create', 'App\Http\Controllers\ProductController@create')->name('createproduct');
	Route::post('/product/store', 'App\Http\Controllers\ProductController@store')->name('store-product');
	Route::get('/product/{id}', 'App\Http\Controllers\ProductController@show')->name('show-product');
	Route::get('/product/destroy/{id}', 'App\Http\Controllers\ProductController@destroy')->name('destroy-product');
	Route::get('/product/edit/{id}', 'App\Http\Controllers\ProductController@edit')->name('edit-product');
	Route::put('/product/{id}/update', 'App\Http\Controllers\ProductController@update')->name('update_product');

	Route::get('/product-image/destroy/{id}', 'App\Http\Controllers\ProductImageController@destroy')->name('destroy-product-image');

	Route::get('/categories', 'App\Http\Controllers\CategoryController@index')->name('veiwcategory');
	Route::get('/category/create', 'App\Http\Controllers\CategoryController@create')->name('createcategory');
	Route::post('/category/store', 'App\Http\Controllers\CategoryController@store')->name('store-category');
    Route::get('/category/edit/{id}', 'App\Http\Controllers\CategoryController@edit')->name('edit-category');
	Route::put('/category/{id}/update', 'App\Http\Controllers\CategoryController@update')->name('update_category');
	Route::get('/category/destroy/{id}', 'App\Http\Controllers\CategoryController@destroy')->name('destroy-category');
	Route::get('category/{id}', 'App\Http\Controllers\CategoryController@show')->name('show-category');


	Route::get('/faq', 'App\Http\Controllers\QuestionController@index')->name('veiwfaq');
	Route::get('/faq/create', 'App\Http\Controllers\QuestionController@create')->name('createfaq');
	Route::post('/faq/store', 'App\Http\Controllers\QuestionController@store')->name('store-faq');
	Route::get('/faq/edit/{id}', 'App\Http\Controllers\QuestionController@edit')->name('edit-faq');
	Route::put('/faq/{id}/update', 'App\Http\Controllers\QuestionController@update')->name('update_faq');
	Route::get('/faq/destroy/{id}', 'App\Http\Controllers\QuestionController@destroy')->name('destroy-faq');


	Route::get('/slides', 'App\Http\Controllers\SlideController@index')->name('veiwslide');
	Route::get('/slide/create', 'App\Http\Controllers\SlideController@create')->name('createslide');
	Route::post('/slide/store', 'App\Http\Controllers\SlideController@store')->name('store-slide');
	Route::get('/slide/edit/{id}', 'App\Http\Controllers\SlideController@edit')->name('edit-slide');
	Route::put('/slide/{id}/update', 'App\Http\Controllers\SlideController@update')->name('update-slide');
	Route::get('/slide/destroy/{id}', 'App\Http\Controllers\SlideController@destroy')->name('destroy-slide');

	Route::get('/contact', 'App\Http\Controllers\ContatController@index')->name('veiwcontact');
	Route::get('/contact/destroy/{id}', 'App\Http\Controllers\ContatController@destroy')->name('destroy-contact');

	Route::get('/info', 'App\Http\Controllers\InfoController@index')->name('veiwinfo');
	Route::get('/info/create', 'App\Http\Controllers\InfoController@create')->name('createinfo');
	Route::post('/info/store', 'App\Http\Controllers\InfoController@store')->name('store-info');
	Route::get('/info/destroy/{id}', 'App\Http\Controllers\InfoController@destroy')->name('destroy-info');
	Route::get('/info/edit/{id}', 'App\Http\Controllers\InfoController@edit')->name('edit-info');
	Route::put('/info/{id}/update', 'App\Http\Controllers\InfoController@update')->name('update_info');

	Route::get('/inactive', 'App\Http\Controllers\InactiveController@index')->name('veiwinactive');
	Route::get('/inactive/destroy/{id}', 'App\Http\Controllers\InactiveController@destroy')->name('destroy-inactive');

	Route::get('/general', 'App\Http\Controllers\GeneralController@index')->name('veiwgeneral');
	Route::get('/general/create', 'App\Http\Controllers\GeneralController@create')->name('creategeneral');
	Route::post('/general/store', 'App\Http\Controllers\GeneralController@store')->name('store-general');
	Route::get('/general/destroy/{id}', 'App\Http\Controllers\GeneralController@destroy')->name('destroy-general');
	Route::get('/general/edit/{id}', 'App\Http\Controllers\GeneralController@edit')->name('edit-general');
	Route::put('/general/{id}/update', 'App\Http\Controllers\GeneralController@update')->name('update_general');

	Route::get('/company', 'App\Http\Controllers\CompanyController@index')->name('veiwcompany');
	Route::get('/company/create', 'App\Http\Controllers\CompanyController@create')->name('createcompany');
	Route::post('/company/store', 'App\Http\Controllers\CompanyController@store')->name('store-company');
	Route::get('/company/destroy/{id}', 'App\Http\Controllers\CompanyController@destroy')->name('destroy-company');

    Route::get('/storage-link-fix', function () {
        Artisan::call('storage:link');
        echo 'done';
    });

    Route::get('/clear-cache', function () {
        Artisan::call('config:clear');
        Artisan::call('cache:clear');
        Artisan::call('view:clear');
        echo 'done';
    });
});

/*
    Route::get('/oo', function () {
        return view('frontlayouts.layouts');
    });

    Route::get('/test', function () {
        $image =  App\Models\ProductImages::first();
        $product =  App\Models\Product::latest()->first();
        dd($image , $image->path_url , $product , $product->images , $product->images->first()->path_url);
    });
*/

Auth::routes();

Route::get('/admin', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
