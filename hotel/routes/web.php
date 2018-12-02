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

use App\Hotel;
use App\Comment;
Route::get('','HomeController@index');

Auth::routes();

//Route::resource('/lates','LateController');
Route::group(['prefix'=>'admin','middleware'=>'admin'], function () {
	Route::get('','AdminController@index');
    
     Route::group(['prefix'=>'districts'],function(){
     Route::get('','AdminController@getIndexDistrict')->name('admin.districts');
     Route::get('create','AdminController@getCreateDistrict');
     Route::post('create','AdminController@postCreateDistrict')->name('admin.districts.create');
     Route::get('edit/{id}','AdminController@getEditDistrict');
     Route::post('edit/{id}','AdminController@postEditDistrict')->name('admin.districts.edit');
     Route::get('delete/{id}','AdminController@getDeleteDistrict');
     });

     Route::group(['prefix'=>'utilities'],function(){
     Route::get('','AdminController@getIndexUtility')->name('admin.utilities');
     Route::get('create','AdminController@getCreateUtility');
     Route::post('create','AdminController@postCreateUtility')->name('admin.utilities.create');
     Route::get('edit/{id}','AdminController@getEditUtility');
     Route::post('edit/{id}','AdminController@postEditUtility')->name('admin.utilities.edit');
     Route::get('delete/{id}','AdminController@getDeleteUtility');
     });

     Route::group(['prefix'=>'hotels'],function(){
     Route::get('','AdminController@getIndexHotel')->name('admin.hotels');
     Route::get('approve','AdminController@getIndexHotelApprove')->name('admin.hotels.approve');
     Route::get('delete/{id}','AdminController@getDeleteHotel');
     Route::get('approve/{id}/{flag}','AdminController@approveHotel');
     });



 });
Auth::routes();

Route::get('/home',function(){
return view('index');
});

Route::get('/hotels/{id}',function($id){
    $hotel = Hotel::find($id);
    $comments = Comment::where('hotel_id',$id)->get();
    $hotel->count_view = $hotel->count_view +1;
    $hotel->save();
    
    return view('home.detail',['hotel'=>$hotel,'comments' =>$comments]);

    });

 Route::post('hotels/{id}','UserController@postComment')->name('user.comment');


  Route::group(['prefix'=>'users'],function(){
     Route::get('profile','UserController@getProfile')->name('users.profile');
     Route::get('create','UserController@getCreate');
     Route::post('create','UserController@postCreate')->name('users.create');
    
     });

  Route::get('search','HomeController@search');