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

Route::get('/', function () {
    return view('top');
});

// sign up
$this->post('user/register', 'User\RegisterController@register')->name('user.register');


// login logout
$this->post('user/login', 'User\LoginController@login')->name('user.login');
$this->get('user/logout', 'User\LoginController@logout')->name('user.logout');

//intialize password
$this->get('user/password/reset', 'User\ForgotPasswordController@showLinkRequestForm')->name('user.password.request');
$this->post('user/password/email', 'User\ForgotPasswordController@sendResetLinkEmail')->name('user.password.email');
$this->get('user/password/reset/{token}', 'User\ResetPasswordController@showResetForm')->name('user.password.reset');
$this->post('user/password/reset/{token}', 'User\ResetPasswordController@reset');
$this->get('user/password/successful', 'User\ResetPasswordController@showSuccessful')->name('user.password.successful');


$this->get('user/home', 'User\HomeController@showHome')->name('user.home');


Route::group(['middleware'=>'auth'], function(){

  Route::resource('user/profile', 'User\UserProfileController');

});
