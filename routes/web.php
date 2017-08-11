<?php

    Route::group(['namespace'=>'Site'], function(){

    Route::get('posts/{slug}','postController@posts');

    Route::get('/','HomeController@index');

});


//Route::get('/', function () {
//
//    return view('site.home');
//});


//Route::get('posts', function () {
//    return view('site.post');
//});



Route::get('user', function () {
    return view('admin/home');
});

Route::get('user', function () {
    return view('admin/home');
});


Route::group(['namespace'=>'Admin','middleware'=>'auth:admin'], function(){

    Route::resource('post','PostController');

    Route::resource('tag','TagController');

    Route::resource('category','CategoryController');

    Route::resource('user','UserController');

    Route::resource('role','RoleController');

    Route::resource('permission','PermissionController');
});

Route::group(['namespace'=>'Admin'], function(){
    Route::get('admin-login','Auth\LoginController@showLoginForm')->name('admin.login');
    Route::post('admin-login', 'Auth\LoginController@login');
});





Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
