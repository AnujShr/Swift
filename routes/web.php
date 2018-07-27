<?php

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

Route::get('/', function () {
    return view('front/home');
})->name('/');

Route::get('/about', function () {
    return view('front/about');
})->name('about');
Route::get('/work', function () {
    return view('front/work');
})->name('work');
Route::get('/services', function () {
    return view('front/services');
})->name('services');
Route::get('/pricing', function () {
    return view('front/pricing');
})->name('pricing');
Route::get('/contact', function () {
    return view('front/contact');
})->name('contact');


Route::post('/contact', 'Contac1tController@store');
Route::get('/register/confirm', 'Auth\RegisterConfirmationController@index')->name('register.confirm');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', 'HomeController@index')->name('home');
});

Route::group(['middleware' => ['auth', 'admin'], 'prefix' => 'admin','namespace'=>'Admin'], function () {
    Route::get('/', function () {
        return view('admin.dasboard.index');
    })->name('admin');
    Route::get('profile','ProfileController@index')->name('admin.profile');
    Route::post('profile','ProfileController@update');
    Route::post('confirm-password','ProfileController@confirmPassword');
    Route::post('change-password','ProfileController@changePassword');
});

