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
Route::get('/register/confirm', 'Auth\RegisterConfirmationController@index')->name('register.confirm');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');

Route::get('/contact', 'PageController@contact')->name('front.contact');
Route::post('/contact', 'ContactController@store')->name('front.contact.store');

Route::get('/about', 'PageController@about')->name('front.about');

Route::get('/work',function (){
    return view('front.work.index');
})->name('work');

Route::group(['middleware' => ['auth']], function () {
    Route::get('profile', 'ProfileController@index')->name('user.profile');
});
Route::group(['middleware' => ['web', 'auth', 'admin'], 'prefix' => 'admin', 'namespace' => 'Admin'], function () {

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
    Route::post('users','UserController@search')->name('admin.users.search');

    Route::get('user/login/{id}', 'UserController@loginAs')->name('admin.loginAsUser');

    Route::get('pages', 'PageController@index')->name('admin.pages');
    Route::get('pages/{slug}', 'PageController@view')->name('admin.pages.view');
    Route::put('pages/{slug}', 'PageController@update')->name('admin.page.update');
});


