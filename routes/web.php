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

//Login is Admin
Route::get('/login_is_admin/{id?}','Is_admin\Is_adminController@index_ADMIN');
Route::get('/home_property','Is_admin\Is_adminController@index');

//admin home stay
Route::any('/admin_home_stay','Admin_home\AdminhomeController@index');
Route::get('/admin_home_stay/create/form','Admin_home\AdminhomeController@form');
Route::post('/admin_home_stay/create','Admin_home\AdminhomeController@create');
Route::post('/admin_home_stay/view','Admin_home\AdminhomeController@show');
Route::get('/admin_home_stay/edit/{id?}','Admin_home\AdminhomeController@edit');
Route::post('/admin_home_stay/update','Admin_home\AdminhomeController@update');
Route::post('/admin_home_stay/delete','Admin_home\AdminhomeController@destroy');
Route::post('/admin_home_stay/delete_room','Admin_home\AdminhomeController@delete_room');
