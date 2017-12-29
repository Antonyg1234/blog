<?php

    Route::group(['namespace'=>'Site','middleware'=>'auth'], function(){

        Route::get('posts/{slug}','postController@posts');

        Route::get('tags/{tag}','HomeController@tag');

        Route::get('category/{category}','HomeController@category');

    });

    Route::get('/','Site\HomeController@index')->name('base');

    Route::get('like','Site\HomeController@likes')->name('like');

    Route::get('slug','Admin\PostController@slug')->name('slug');


    Route::get('about', function () {
        return view('site.about');
    })->name('about');


    Route::get('contact', function () {
        return view('site.contact');
    })->name('contact');



    Route::get('sample-post', function () {
        return view('site.sample-post');
    })->name('sample-post');


    Route::get('test', function () {
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
        Route::post('admin-logout', 'Auth\LoginController@logout')->name('admin.logout');
    });



    Auth::routes();
    
    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('login/facebook', 'Auth\LoginController@redirectToProvider');
    Route::get('login/facebook/callback', 'Auth\LoginController@handleProviderCallback');
