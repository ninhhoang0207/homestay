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


Auth::routes();
Route::get('login/facebook', 'SocialAuthController@fbRedirectToProvider')->name('facebookLogin');
Route::get('login/facebook/callback', 'SocialAuthController@fbHandleProviderCallback');
Route::post('login/facebook/confirm', 'SocialAuthController@confirm')->name('socialConfirm');
Route::get('login/google', 'SocialAuthController@ggRedirectToProvider')->name('googleLogin');
Route::get('login/google/callback', 'SocialAuthController@ggHandleProviderCallback');
Route::get('/logout', 'Auth\LoginController@logout');
Route::get('getImgs','HotelController@getImgs')->name('getImg');
// Route::get('/', 'HomeController@index');
// Route::get('test','HotelController@test');
// Route::get('test/delete','HotelController@testDelete')->name('imgDel');
// Route::post('test/delete','HotelController@testDelete');
// Route::get('testGet','HotelController@testPost')->name('testGet');
// Route::post('testPost','HotelController@testPost')->name('testPost');
// Hotel
Route::get('he-thong','HotelController@index')->name('system');
Route::get('hotel-manager','HotelController@index')->name('hotel');
Route::get('hotel-statistic','HotelController@index_statistic')->name('hotel.statistic');
Route::get('hotel-get-data','HotelController@getData_charts');
Route::get('hotel-register','HotelController@register')->name('hotel.register');
Route::post('hotel-create','HotelController@create')->name('hotel.create');
Route::get('hotel-edit/{id?}','HotelController@edit')->name('hotel.edit');
Route::post('hotel-edit/{id?}','HotelController@update');
Route::get('hotel-confirm-delete/{id?}','HotelController@getModalDelete')->name('hotel.confirm.delete');
Route::get('hotel-delete/{id?}','HotelController@delete')->name('hotel.delete');
Route::get('hotel-bookroom-list/{id?}','HotelController@bookroomList')->name('hotel.bookroomList');
// Hotel-upload images
Route::group(['prefix'=>'hotel'], function(){
	Route::post('upload-img','HotelController@uploadImg')->name('hotel.uploadImg');
	Route::post('delete-img','HotelController@deleteImg')->name('hotel.deleteImg');
	Route::post('delete-img-edit','HotelController@deleteImg_edit')->name('hotel.deleteImg.edit');
	Route::get('recover-img','HotelController@recoverImgs')->name('hotel.recoverImgs');
	Route::get('get-imgs/{id?}','HotelController@getImgs')->name('hotel.getImgs');
});
// User
Route::get('user-manager','AdminUserController@index')->name('userManager');
Route::get('users-data','AdminUserController@data')->name('usersData');
Route::get('user-edit/{id}','AdminUserController@edit')->name('userEdit');
Route::get('user-del/{id}','AdminUserController@delete')->name('userDel');
Route::post('user-update','AdminUserController@update')->name('userUpdate');

//Home
Route::get('/','HomesController@index')->name('home');
Route::post('/','HomesController@searchHotel');
Route::post('sign-in','HomesController@signin')->name('signin');
Route::get('search-hotel/{coordinate?}/{range?}','HomesController@searchHotel')->name('searchHotel');
Route::post('search-hotel/{coordinate?}/{range?}','HomesController@searchHotel')->name('searchHotel');
Route::get('find-by-range','HomesController@findByRange')->name('findByRange');
Route::get('detail','HomesController@detail')->name('detailHotel');
Route::get('load-images','HomesController@loadImages')->name('loadImages');
Route::get('view-map','HomesController@viewMap')->name('viewMap');
// Bookroom
Route::post('bookroom','BookroomController@bookroomPost')->name('bookroom');