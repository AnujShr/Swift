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
})->name('home');

Route::get('/home', 'HomeController@index')->name('home');
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
Route::get('/home', 'HomeController@index')->name('home');

Route::post('/contact', 'Contac1tController@store');
Route::get('/register/confirm', 'Auth\RegisterConfirmationController@index')->name('register.confirm');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');

Route::group(['middleware'=>['auth','admin'],'prefix'=>'admin'],function(){
    Route::get('/', function () {
        return view('admin.dasboard.index');
    })->name('admin');
});
