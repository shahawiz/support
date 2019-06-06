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

#Tickets Section
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
#user Notifications
Route::get('/user/notifications','UserController@notifications')->name('all_notifications');

Route::get('/user/profile','UserController@edit')->name('profile');
Route::post('/user/profile','UserController@update')->name('profile');
route::get('/user/avatar','UserController@viewAvatar')->name('change_avatar');
route::post('/user/avatar','UserController@updateAvatar')->name('update_avatar');

#Contact Us
Route::get('/contactus','ContactusController@index')->name('contactus');
#Downloads Center
Route::get('/downloads','DownloadsController@index')->name('downloads');
Route::get('/downloads/{file?}','DownloadsController@singleFile');
#Knowledge Center
Route::get('/kcenter','KcenterController@index')->name('kcenter');
Route::get('/kcenter/{topic?}','KcenterController@singleTopic');

#APIs
Route::get('/api/notifications/all','UserController@all_notifications')->name('api_AllNotif');
Route::get('/user/notifications/read/{notifId?}/{ticketId?}','UserController@read_notification')->name('read_notification');

 #Admin Dashboard
Route::group(['middleware' => ['auth','CheckAdmin']], function () {
Route::get('/admin','admin\AdminController@Home')->name('admin');
Route::get('/admin/settings','admin\AdminController@siteSettings')->name('site_settings');
Route::get('/admin/users','admin\AdminController@usersList')->name('admin_users');
Route::get('/admin/staff','admin\AdminController@staffList')->name('admin_staff');
Route::get('/admin/departments','admin\AdminController@departmentsList')->name('admin_departments');

});
