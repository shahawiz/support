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

//! Tickets Section
Route::get('/','PagesController@index');
Route::get('/tickets/all','TicketsController@index')->name('all_tickets');
Route::get('/tickets/pending','TicketsController@pendingTicketsList')->name('pending_tickets');
Route::get('/tickets/answered','TicketsController@answeredTicketsList')->name('answered_tickets');
Route::get('/tickets/solved','TicketsController@solvedTicketsList')->name('solved_tickets');
Route::get('/tickets/create','TicketsController@create')->name('create_ticket');
Route::post('/tickets/create','TicketsController@store');
Route::get('/tickets/view/{slug?}','TicketsController@show')->name('view_ticket');
Route::get('/tickets/edit/{slug?}','TicketsController@edit');
Route::post('/tickets/edit/{slug?}','TicketsController@update');
Route::get('/tickets/close/{slug?}','TicketsController@close');
Route::get('/tickets/delete/{slug?}','TicketsController@destroy');
Route::post('/comment','CommentsController@createComment');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');


Route::get('/user/profile','UserController@edit')->name('profile');
Route::post('/user/profile','UserController@update')->name('profile');
route::get('/user/avatar','UserController@viewAvatar')->name('change_avatar');
route::post('/user/avatar','UserController@updateAvatar')->name('update_avatar');

//! Contact Us
Route::get('/contactus','ContactusController@index')->name('contactus');
Route::post('/contactus','ContactusController@sendMessage')->name('contactus');
//! Downloads Center
Route::get('/downloads','DownloadsController@index')->name('downloads');
Route::get('/downloads/{file?}','DownloadsController@singleFile');
//! Knowledge Center
Route::get('/kcenter','KcenterController@index')->name('kcenter');
Route::get('/kcenter/{topic?}','KcenterController@singleTopic');
