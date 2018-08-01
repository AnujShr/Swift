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

Route::get('/', 'HomeController@index')->name('front.home');
Route::get('/contact', 'ContactController@index')->name('front.contact');
Route::post('/contact', 'ContactController@store')->name('front.contact.store');
Route::get('/register/confirm', 'Auth\RegisterConfirmationController@index')->name('register.confirm');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');


Route::group(['middleware' => ['auth', 'admin'], 'prefix' => 'admin', 'namespace' => 'Admin'], function () {
    Route::get('/', function () {
        return view('admin.dasboard.index');
    })->name('admin');
    Route::get('profile', 'ProfileController@index')->name('admin.profile');
    Route::post('profile', 'ProfileController@update');
    Route::post('confirm-password', 'ProfileController@confirmPassword');
    Route::post('change-password', 'ProfileController@changePassword');
    Route::post('profile-picture', 'ProfileController@uploadProfilePicture')->name('admin.profile.picture');
    Route::post('delete-profile-picture', 'ProfileController@deleteProfilePicture')->name('admin.profile.delete');
    Route::get('users', 'UserController@index')->name('admin.users');
    Route::get('user/login/{id}', 'UserController@loginAs')->name('admin.loginAsUser');

});


