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

Route::get('/', 'FrontController@rooms')->name('home');

Route::get('front/room-details', 'FrontController@roomdetails')->name('front.room-details');


Auth::routes();

Route::group(['middleware'=>['auth', 'admin']], function(){

Route::get('admin/dashboard', 'AdiminController@dashboard')->name('admin.dashboard');

Route::match(['get', 'post'], 'admin/hostels', 'HostelsController@hostels')->name('admin.hostels');

Route::match(['get', 'post'], 'admin/newhostel', 'NewHostelController@newhostel')->name('admin.newhostel');
Route::post('admin/newhostel', 'NewHostelController@hostelnew')->name('admin.hostelnew');
	
// Route::get('/admin', function () {
//     return view('layouts.admin');
// });
Route::match(['get', 'post'], 'admin/account', 'AccountController@account')->name('admin.account');

Route::post('admin/account', 'AccountController@update')->name('admin.update');

Route::match(['get', 'post'], 'admin/newcustodian', 'NewCustodianController@newcustodian')->name('admin.newcustodian');

Route::post('admin/newcustodian', 'NewCustodianController@check')->name('admin.check');

Route::match(['get', 'post'], 'admin/custodians', 'CustodiansController@custodians')->name('admin.custodians');

// Route::match(['get', 'post'], 'admin/custodians', 'CustodiansController@destroy')->name('admin.delete');


	});


Route::group(['middleware'=>['auth', 'custodian']], function(){

Route::get('custodian/dashboard', 'CustodianController@dashboard')->name('custodian.dashboard');

Route::match(['get', 'post'], 'custodian/account', 'CustodianAccountController@account')->name('custodian.account');

Route::post('custodian/account', 'CustodianAccountController@update')->name('custodian.update');

Route::match(['get', 'post'], 'custodian/hostel', 'CustodianHostelController@hostel')->name('custodian.hostel');

 Route::resource('rooms', 'RoomController');
Route::get('custodian/rooms', 'RoomController@index')->name('custodian.rooms');
// Route::get('/employees/{id}/edit','EmployeeController@edit')->name('employees.edit');
Route::get('custodian/{id}/delete','RoomController@destroy')->name('custodian.destroy');
Route::get('custodian/newroom','RoomController@create')->name('custodian.newroom');
 Route::post('custodian/newroom','RoomController@store')->name('custodian.store');
// Route::post('/employee/update','EmployeeController@update')->name('employees.update');

});