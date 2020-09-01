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



Route::get('/', 'HomeController@index')->name('welcome');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/room/reservation/{id}', 'ReservationController@index')->middleware('auth:web')->name('reservation.fill');
Route::post('/reservation/{id}', 'ReservationController@store')->middleware('auth:web')->name('reservation.store');

//profile student
Route::get('/profile', 'ProfileController@profile')->name('profile');
Route::put('/profile', 'ProfileController@update');

Route::prefix('/office')->name('office.')->namespace('Office')->group(function () {
    Route::get('/user/{id}', 'HomeController@show')->name('user.show');
    Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('/login', 'Auth\LoginController@login');
    Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

    //Forgot Password Routes
    Route::get('/password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');

    //Reset Password Routes
    Route::get('/password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('/password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

    Route::get('/dashboard', 'HomeController@index')->name('home');
    Route::prefix('/dashboard')->name('dashboard.')->middleware('auth:office')->group(function () {

        Route::get('/', 'HomeController@index')->name('home');
        //rooms office route
        Route::get('/rooms', 'RoomController@index')->name('rooms');
        Route::patch('/room/{id}', 'RoomController@togglePublish')->name('room.togglePublish');
        //foyers office route
        Route::get('/foyers', 'FoyerController@index')->name('foyers');
        Route::get('/foyers/{id}/edit', 'FoyerController@edit')->name('foyer.edit');
        Route::put('/foyers/{id}', 'FoyerController@update')->name('foyer.update');
        //Profile office route
        Route::get('/office', 'ProfileController@profile')->name('profile');
        Route::put('/office', 'ProfileController@update')->name('profileUpdate');
    });

});

Route::prefix('/foyer')->name('foyer.')->namespace('Foyer')->group(function () {
    Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('/login', 'Auth\LoginController@login');
    Route::get('/register', 'Auth\RegisterController@showRegisterForm')->name('register');
    Route::post('/register', 'Auth\RegisterController@register');
    Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

    //Forgot Password Routes
    Route::get('/password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');

    //Reset Password Routes
    Route::get('/password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('/password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

    Route::prefix('/dashboard')->name('dashboard.')->middleware('auth:foyer')->group(function () {
        Route::get('/', 'ChambreController@index')->name('home');
        Route::get('/requests', 'ChambreController@students')->name('students');
        Route::get('/residents', 'ChambreController@residents')->name('residents');
        Route::post('/requests/accept/{id}', 'ChambreController@acceptReservation')->name('student.reservations.accept');
        Route::post('/requests/refuse/{id}', 'ChambreController@RefuseReservation')->name('student.reservations.refuse');
        Route::prefix('/room')->name('room.')->middleware('auth:foyer')->group(function () {
            Route::get('/create', 'ChambreController@create')->name('create');
            Route::post('/', 'ChambreController@store')->name('store');
            Route::get('/{id}', 'ChambreController@show')->name('show');
            Route::get('/{id}/edit', 'ChambreController@edit')->name('edit');
            Route::put('/{id}', 'ChambreController@update')->name('update');
            Route::delete('/{id}', 'ChambreController@destroy')->name('destroy');
        });
        Route::prefix('/student')->name('student.')->middleware('auth:foyer')->group(function () {
            Route::get('/{id}/edit', 'ChambreController@edit_student')->name('edit');
            Route::get('/{id}', 'ChambreController@show_student')->name('show');
            Route::put('/{id}', 'ChambreController@update_student')->name('update');
            Route::delete('/{id}', 'ChambreController@destroy_student')->name('destroy');
        });

        //Profile foyer route
        Route::get('/profile', 'ProfileController@profile')->name('profile');
        Route::put('/profile', 'ProfileController@update')->name('profileUpdate');


    });


});
Route::get('/foyer/{id}', 'HomeController@show')->name('room.show');
