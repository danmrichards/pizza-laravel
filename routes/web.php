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
use Illuminate\Http\Request;

Route::get('/', 'PagesController@index');
Route::get('/order', 'PagesController@order');
Route::get('/order/{pizza}', 'PagesController@order');
Route::get('/offers', 'PagesController@offers');
Route::get('/gallery', 'PagesController@gallery');
Route::get('/contact', 'PagesController@contact');
Route::get('/about', 'PagesController@about');

Route::get('/pizza/{pizza}', 'PizzasController@show');

Route::post('/message/send', 'MessagesController@send');
Route::get('/home', 'PagesController@index');

Route::get('/login', 'SessionsController@index');
Route::post('/login', 'SessionsController@create');

Route::get('/logout', 'SessionsController@destroy');
Route::post('/logout', 'SessionsController@destroy');

Route::get('/register', 'RegisterController@create');
Route::post('/register', 'RegisterController@store');
Route::get('/dashboard', 'DashboardController@index');


Route::get('/admin', 'Admin\AdminPagesController@index');
Route::post('/admin', 'Admin\AdminPagesController@index');

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
Route::get('/admin/message/read/{message}', 'MessagesController@read');
Route::post('/admin/messages', 'MessagesController@reply');

Route::get('/admin/offers', 'Admin\AdminPagesController@offers');
Route::get('/admin/offers/add', 'OffersController@add');
Route::get('/admin/offers/edit/{offer}', 'OffersController@edit');
Route::get('/admin/offers/delete/{offer}', 'OffersController@delete');
Route::post('/admin/offers/add', 'OffersController@create');
Route::post('/admin/offers/update/{offer}', 'OffersController@update');
Route::post('/admin/offers/remove/{offer}', 'OffersController@deleteImage');

Route::get('/admin/slider', 'Admin\AdminPagesController@slider');
Route::post('/admin/slider/add', 'Admin\SliderController@add');
Route::post('/admin/slider/delete', 'Admin\SliderController@delete');

Route::get('/admin/products', 'Admin\AdminPagesController@products');
Route::get('/admin/products/toppings', 'Admin\AdminPagesController@toppings');
Route::get('/admin/products/extras', 'Admin\AdminPagesController@extras');

Route::get('/admin/products/pizzas', 'Admin\AdminPagesController@pizzas');
Route::get('/admin/products/pizzas/add', 'Admin\PizzasController@add');
Route::post('/admin/products/pizzas/add', 'Admin\PizzasController@create');
Route::get('/admin/products/pizzas/edit/{pizza}', 'Admin\PizzasController@edit');
Route::post('/admin/products/pizzas/remove_images', 'Admin\PizzasController@removeImages');
Route::post('/admin/products/pizzas/add_images', 'Admin\PizzasController@addImages');
Route::post('/admin/products/pizzas/update/{pizza}', 'Admin\PizzasController@update');

Route::get('/admin/products/bases', 'Admin\AdminPagesController@bases');
Route::get('/admin/products/bases/add', 'Admin\BasesController@add');
Route::post('/admin/prodcuts/bases/create', 'Admin\BasesController@create');
Route::get('/admin/products/bases/edit/{base}', 'Admin\BasesController@edit');
Route::post('/admin/products/bases/update/{base}', 'Admin\BasesController@update');
Route::get('/admin/products/bases/delete/{base}', 'Admin\BasesController@remove');

Route::get('/admin/products/toppings', 'Admin\AdminPagesController@toppings');
Route::get('/admin/products/toppings/add', 'Admin\ToppingsController@add');
Route::post('/admin/prodcuts/toppings/create', 'Admin\ToppingsController@create');
Route::get('/admin/products/toppings/edit/{topping}', 'Admin\ToppingsController@edit');
Route::post('/admin/products/toppings/update/{topping}', 'Admin\ToppingsController@update');
Route::get('/admin/products/toppings/delete/{topping}', 'Admin\ToppingsController@remove');

Route::get('/admin/products/extras', 'Admin\AdminPagesController@extras');
Route::get('/admin/products/extras/add', 'Admin\ExtrasController@add');
Route::post('/admin/prodcuts/extras/create', 'Admin\ExtrasController@create');
Route::get('/admin/products/extras/edit/{extra}', 'Admin\ExtrasController@edit');
Route::post('/admin/products/extras/update/{extra}', 'Admin\ExtrasController@update');
Route::get('/admin/products/extras/delete/{extra}', 'Admin\ExtrasController@remove');

Route::get('/admin/about', 'Admin\AdminPagesController@about');
Route::post('/admin/about/{about}', 'Admin\AboutController@save');

Route::post('/cart/add', 'CartController@create');
Route::get('/cart/remove/{cartItem}', 'CartController@destroy');
Route::get('/cart/checkout/{cart}', 'CartController@checkout');
