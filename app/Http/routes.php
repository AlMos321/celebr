<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');
Route::get('/', 'BookingController@index');

Route::get('/booking/get-time', 'BookingController@getTime');
Route::get('/booking/get-next-time', 'BookingController@getNextWeek');
Route::get('/booking/get-prev-time', 'BookingController@getPreviousWeek');
Route::get('/booking/get-str-time', 'BookingController@getStrTime');



Route::post('/order/create/', 'BookingController@store');

Route::post('/order/delete', 'ProfileNotesController@delete');

Route::auth();

Route::get('/home', 'HomeController@index');

Route::get('/employe', 'EmployeController@index');
Route::post('/create/employe', 'EmployeController@create');
Route::post('/load/categories', 'EmployeController@getCategories');
Route::post('/change/employe', 'EmployeController@changeEmploye');
Route::post('/delete/employe', 'EmployeController@delete');


Route::get('/holidays', 'HolidaysController@index');
Route::post('/create/holiday', 'HolidaysController@create');
Route::post('/change/holiday', 'HolidaysController@changeHolidays');
Route::post('/select/type', 'BookingController@selectType');
Route::post('/delete/holiday', 'BookingController@delete');


Route::get('/personal-data', 'PersonalDataController@index');
Route::post('/personal-data/update', 'PersonalDataController@store');

Route::get('/profile-notes', 'ProfileNotesController@index');
Route::post('/order/delete', 'ProfileNotesController@delete');


Route::get('/delivering', 'DeliveringController@index');
Route::post('/delivering/phone', 'DeliveringController@deliveryPhone');
Route::post('/delivering/email', 'DeliveringController@deliveryEmail');


Route::get('/time/color', 'BookingController@getTimeColor');


Route::get('/shops', 'ShopsController@index');
Route::post('/load/holidays', 'ShopsController@loadHolidays');
Route::post('/create/shop', 'ShopsController@create');
Route::post('/change/shop', 'ShopsController@changeShop');
Route::post('/delete/shop', 'ShopsController@delete');
Route::post('/get/shop/holiday', 'ShopsController@getShopByHolidays');
