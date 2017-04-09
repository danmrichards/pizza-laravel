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
Route::get('/', 'PagesController@index');
Route::get('/order', 'PagesController@order');
Route::get('/offers', 'PagesController@offers');
Route::get('/gallery', 'PagesController@gallery');
Route::get('/contact', 'PagesController@contact');
Route::get('/about', 'PagesController@about');

Route::get('/pizza/{pizza}', 'PizzasController@show');

Route::post('/message/send', 'MessagesController@send');
Route::get('/home', function (){
	return redirect('/');
});

Route::get('/login', 'SessionsController@index');
Route::post('/login', 'SessionsController@create');

Route::get('/logout', 'SessionsController@destroy');
Route::post('/logout', 'SessionsController@destroy');

Route::get('/register', 'RegisterController@create');
Route::post('/register', 'RegisterController@store');
Route::get('/dashboard', 'DashboardController@index');


Route::get('/admin', 'Admin\AdminPagesController@index');
Route::get('/admin/customers', 'Admin\AdminPagesController@customers');
Route::get('/admin/customer/add', 'Admin\CustomersController@add');
Route::post('/admin/customer/create', 'Admin\CustomersController@create');
Route::get('/admin/customer/edit/{user}', 'Admin\CustomersController@edit');
Route::post('/admin/customer/update', 'Admin\CustomersController@update');
Route::get('/admin/customer/delete/{user}', 'Admin\CustomersController@delete');

Route::get('/admin/gallery', 'Admin\AdminPagesController@gallery');
Route::post('/admin/gallery/add', 'Admin\GalleryController@add');
Route::post('/admin/gallery/delete', 'Admin\GalleryController@delete');

Route::get('/admin/messages', 'Admin\AdminPagesController@messages');
/*
GET /posts
GET /posts/create
POST /posts
GET /posts/{id}/edit
GET /posts/{id}
PATCH /posts/{id}
DELETE /posts/{id}

*/
