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
Route::get('/', function () {
    return view('index.index');
});

Route::get('/home', function () {
    return view('home_stay.list_home_stay');
});

Route::get('/login_success','Homeuser/HomeuserController@index');

//Route::get('/home', 'HomeController@index')->name('home');
//Language
Route::get('locale/{locale?}',function($locale){
    Session::put('locale',$locale);
    return redirect()->back();
});
