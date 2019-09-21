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
Route::get('/super_admin/dashboard','SuperAdmin\PropertyController@dashboard');
Route::any('/super_admin/list_property','SuperAdmin\PropertyController@index');
Route::post('/super_admin/list_property/create','SuperAdmin\PropertyController@create');
Route::post('/super_admin/list_property/view','SuperAdmin\PropertyController@show');
Route::post('root/admin/select/district', 'SuperAdmin\PropertyController@selectDistrict');
Route::post('root/admin/select/subdistrict','SuperAdmin\PropertyController@Subdistrict');
Route::post('root/admin/select/zip_code','SuperAdmin\PropertyController@zip_code');
Route::post('root/admin/select/district/edit','SuperAdmin\PropertyController@selectDistrictEdit');
Route::post('root/admin/select/editSubDis','SuperAdmin\PropertyController@editSubDis');
Route::get('/super_admin/list_property/edit/{id?}','SuperAdmin\PropertyController@edit');
Route::post('/super_admin/list_property/update','SuperAdmin\PropertyController@update');
Route::post('/super_admin/list_property/delete','SuperAdmin\PropertyController@destroy');
