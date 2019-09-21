<?php


//use Illuminate\Routing\Route;

Auth::routes();
Route::get('/', function () {
    return view('index.index');
});

Route::get('/home', function () {
    return view('home_stay.list_home_stay');
});

Route::get('/login_success','HomeController@index')->name('home');
Route::get('/logout', 'Auth\LoginController@getLogout');

//Route::get('/home', 'HomeController@index')->name('home');
//Language
Route::get('locale/{locale?}',function($locale){
    Session::put('locale',$locale);
    return redirect()->back();
});


//Super Admin
//Property
Route::any('/super_admin/list_property','SuperAdmin\PropertyController@index');
Route::post('/super_admin/list_property/create','SuperAdmin\PropertyController@create');
