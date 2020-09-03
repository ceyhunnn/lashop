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

Route::get('/welcome', function () {
    return view('welcome');
});

Route::namespace('Frontend')->group(function () {
    Route::get('/', 'DefaultController@index')->name('home.Index');
    Route::get('/contact', 'DefaultController@contact')->name('home.Contact');
    Route::post('/contact', 'DefaultController@post_contact');


    //BLOGS
    Route::get('/blogs', 'BlogController@index')->name('blog.Index');
    Route::get('/blog/{id}', 'BlogController@detail')->name('blog.Detail');

    //PRODUCT
    Route::get('/products', 'ProductController@index')->name('product.Index');
    Route::get('/product/{id}', 'ProductController@detail')->name('product.Detail');

    //USER
    Route::post('/registeruser', 'UserController@create')->name('user.Create');
    Route::post('/mlogin', 'UserController@authenticate')->name('home.Authenticate');
    Route::get('/userlogout', 'UserController@logout')->name('home.Logout');




});

Route::namespace('Backend')->group(function () {
    Route::prefix('nedmin')->group(function () {
        Route::get('/', 'DefaultController@login')->name('nedmin.Login')->middleware('CheckLogin');
        Route::get('/register', 'DefaultController@register')->name('nedmin.Register');
        Route::post('/login', 'DefaultController@authenticate')->name('nedmin.Authenticate');
        Route::get('/logout', 'DefaultController@logout')->name('nedmin.Logout');
  });
});


Route::namespace('Backend')->group(function () {
    Route::prefix('nedmin/settings')->group(function () {
      Route::middleware(['admin'])->group(function () {
        Route::get('/', 'SettingsController@index')->name('settings.Index');
        Route::post('', 'SettingsController@sortable')->name('settings.Sortable');
        Route::get('/delete/{id}', 'SettingsController@destroy');
        Route::get('/edit/{id}', 'SettingsController@edit')->name('settings.Edit');
        Route::post('/{id}', 'SettingsController@update')->name('settings.Update');
    });
  });
});


Route::namespace('Backend')->group(function () {
    Route::prefix('nedmin')->group(function () {
      Route::middleware(['admin'])->group(function () {
        //Login
        Route::get('/index', 'DefaultController@index')->name('nedmin.Index');

        //BLOG
        Route::post('/blog/sortable', 'BlogController@sortable')->name('blog.Sortable');
        Route::resource('blog', 'BlogController');

        //PRODUCT
        Route::post('/product/sortable', 'ProductController@sortable')->name('product.Sortable');
        Route::resource('product', 'ProductController');

        //PAGE
        Route::post('/page/sortable', 'PageController@sortable')->name('page.Sortable');
        Route::resource('page', 'PageController');

        //SLIDER
        Route::post('/slider/sortable', 'SliderController@sortable')->name('slider.Sortable');
        Route::resource('slider', 'SliderController');

        //ADMIN
        Route::post('/user/sortable', 'UserController@sortable')->name('user.Sortable');
        Route::resource('user', 'UserController');
    });
  });
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
