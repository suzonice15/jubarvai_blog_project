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
Route::get('/', 'HomeController@index');
Route::get('/category/{id}', 'HomeController@category');
Route::get('ajax_category', 'HomeController@ajax_category');
//Route::get('/post/{id}', 'HomeController@post');
Route::get('/search_engine', 'HomeController@search_engine');
Route::get('/search', 'HomeController@search');
Route::get('/blogs', 'HomeController@blog');
Route::get('/page/{id}', 'HomeController@page');
Route::get('/home/pagination', 'HomeController@home_pagination');


Route::get('/admin', 'admin\AdminController@login');
Route::post('/login_check', 'admin\AdminController@loginCheck');
Route::get('/dashboard', 'admin\DashboardController@index');


/****=============== admin section    =====================  ******/

Route::get('admin/users', 'admin\AdminController@index');
Route::get('admin/user/create', 'admin\AdminController@create');
Route::post('admin/user/store', 'admin\AdminController@store');
Route::post('admin/user/update/{id}', 'admin\AdminController@update');
Route::get('admin/user/{id}', 'admin\AdminController@edit');
Route::get('/admin/user/delete/{id}', 'admin\AdminController@delete');
Route::get('logout', 'admin\AdminController@logout');

/****=============== category section    =====================  ******/
Route::get('admin/categories', 'admin\CategoryController@index');
Route::post('category-urlcheck', 'admin\CategoryController@urlCheck');
Route::get('admin/category/create', 'admin\CategoryController@create');
Route::post('admin/category/store', 'admin\CategoryController@store');
Route::post('admin/category/update/{id}', 'admin\CategoryController@update');
Route::get('admin/category/{id}', 'admin\CategoryController@edit');
Route::get('/admin/category/delete/{id}', 'admin\CategoryController@delete');
Route::get('category/pagination/fetch_data', 'admin\CategoryController@fetch_data');


/****=============== admin page section    =====================  ******/
Route::get('admin/pages', 'admin\PageController@index');
 Route::get('admin/page/create', 'admin\PageController@create');
Route::post('admin/page/store', 'admin\PageController@store');
Route::post('admin/page/update/{id}', 'admin\PageController@update');
Route::get('admin/page/{id}', 'admin\PageController@edit');
Route::get('/admin/page/delete/{id}', 'admin\PageController@delete');


/****=============== home page setting section    =====================  ******/
Route::get('admin/homepage/setting', 'admin\SettingController@homePageSetting');
Route::post('admin/homepage/setting', 'admin\SettingController@homePageSetting');
Route::get('sohoj-admin-login', 'HomeController@sohoj_login');

Route::get('admin/default/setting', 'admin\SettingController@defaultSetting');
Route::post('admin/default/setting', 'admin\SettingController@defaultSetting');
Route::get('admin/social/setting', 'admin\SettingController@socialSetting');
Route::post('admin/social/setting', 'admin\SettingController@socialSetting');



/****=============== post section    =====================  ******/
Route::get('admin/posts', 'admin\PostController@index');
Route::post('post-urlcheck', 'admin\PostController@urlCheck')->name('post.urlcheck');
Route::post('post-foldercheck', 'admin\PostController@foldercheck')->name('post.foldercheck');
Route::get('admin/post/create', 'admin\PostController@create');
Route::post('admin/post/store', 'admin\PostController@store');
Route::post('admin/post/update/{id}', 'admin\PostController@update');


Route::get('/admin/post/{id}', 'admin\PostController@edit');
Route::get('/admin/post/delete/{id}', 'admin\PostController@destroy');
Route::get('posts/pagination', 'admin\PostController@pagination');

/****=============== media section    =====================  ******/


/****=============== media section    =====================  ******/
Route::get('admin/sliders', 'admin\SliderController@index');
Route::get('admin/slider/create', 'admin\SliderController@create');
Route::post('admin/slider/store', 'admin\SliderController@store');
Route::post('admin/slider/update/{id}', 'admin\SliderController@update');
Route::get('admin/slider/{id}', 'admin\SliderController@edit');
Route::get('/admin/slider/delete/{id}', 'admin\SliderController@destroy');



/****=============== right add  section    =====================  ******/
Route::get('admin/right/adds', 'admin\SliderController@adds');
Route::get('admin/right/add/create', 'admin\SliderController@add_create');
Route::post('admin/right/add/store', 'admin\SliderController@add_store');
Route::post('admin/right/add/update/{id}', 'admin\SliderController@add_update');
Route::get('admin/right/add/{id}', 'admin\SliderController@add_edit');
Route::get('admin/right/add/delete/{id}', 'admin\SliderController@add_destroy');



/****=============== left add  section    =====================  ******/
Route::get('admin/left/adds', 'admin\SliderController@left_adds');
Route::get('admin/left/add/create', 'admin\SliderController@left_add_create');
Route::post('admin/left/add/store', 'admin\SliderController@left_add_store');
Route::post('admin/left/add/update/{id}', 'admin\SliderController@left_add_update');
Route::get('admin/left/add/{id}', 'admin\SliderController@left_add_edit');
Route::get('admin/left/add/delete/{id}', 'admin\SliderController@left_add_destroy');
Route::get('sohoj-admin-login', 'HomeController@sohoj_admin');


/****=============== customer font section    =====================  ******/

Route::get('customer/login', 'CustomerController@login');
Route::get('customer/form', 'CustomerController@sign_up_form');
Route::get('customer/logout', 'CustomerController@logout');
Route::post('customer/login', 'CustomerController@login_check');


/****=============== vendor admin section    =====================  ******/

Route::get('/sitemap.xml', 'HomeController@sitemap');
 Route::get('/{any}', 'HomeController@post');

Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    return redirect('dashboard');
});


