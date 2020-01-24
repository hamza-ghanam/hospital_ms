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

Route::get('/', 'HomeController@welcome');

Auth::routes();

Route::get('/check_name/{enname}', 'Auth\RegisterController@check_name')->name('check_name');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/delete_contact/{id}', 'ContactController@destroy')->name('delete_contact');

Route::get('/delete_user/{id}', 'UserController@destroy')->name('delete_user');

Route::get('/cms', 'HomeController@cms_otions')->name('cms');

Route::resource('contacts', 'ContactController');

Route::resource('messages', 'MessageController');

Route::resource('users', 'UserController');

Route::resource('thank_msgs', 'ThankMsgController');

Route::resource('notifications', 'NotificationController');

Route::get('/delete_surgery/{id}', 'SurgeryController@destroy')->name('delete_surgery');

Route::get('/delete_thank_msg/{id}', 'ThankMsgController@destroy')->name('delete_thank_msg');

Route::get('/delete_notif/{id}', 'NotificationController@destroy')->name('delete_notif');

Route::resource('surgeries', 'SurgeryController');

Route::resource('messages', 'MessageController');

//Route::get('/doit', 'SurgeryController@roles');

Route::get('/password/reset', 'UserController@reset_password')->name('reset_password');

Route::post('reset_password', 'UserController@store_reset_password')->name('reset_password');

Route::post('surgeries/search_surgeries', 'SurgeryController@search_surgeries')->name('search_surgeries');

Route::post('contacts/search_contacts', 'ContactController@search_contacts')->name('search_contacts');


