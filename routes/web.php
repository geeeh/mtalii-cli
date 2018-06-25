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
Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/plan', 'HomeController@plan')->name('plan');
Route::post('/search', 'HomeController@searchEvents')->name('search');
Route::get('/events', 'EventController@index') -> name('events');
Route::post('/events', 'EventController@create') -> name('events');
Route::get('/profile', 'DashboardController@userProfile')->name('userprofile');
Route::post('/profile', 'DashboardController@createUserProfile')->name('userprofile');
Route::get('/about', 'HomeController@about') -> name('about');
Route::get('/dash', 'DashboardController@index')->name('dash');
Route::get('/getLogout', 'AuthController@getLogout')->name('getLogout');
Route::get('/companies', 'CompanyController@index')->name('companies');
Route::get('/categories', 'CategoryController@index')->name('categories');
Route::post('/companies', 'CompanyController@create')->name('companies');
Route::delete('/deletecompany/{id}', 'CompanyController@delete')->name('deletecompany');
Route::get('/dashevents', 'EventController@fetchAllEventsByCurrentUserCompanies')->name('dashevents');
Route::post('/makerequest', 'RequestController@create')->name('makerequest');
Route::get('login/google', 'Auth\LoginController@redirectToProvider')->name('googleLogin');
Route::get('login/google/callback', 'Auth\LoginController@handleProviderCallback')->name('googleCallback');
Route::get('/gallery', 'GalleryController@index')->name('gallery');
Route::post('/gallery', 'GalleryController@create')->name('gallery');
Route::post('/interested', 'HomeController@sendRequests')->name('interested');
