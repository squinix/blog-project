<?php

use App\Post;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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

/* Route::get('/customers', 'CustomersController@index');
Route::get('/customers/create', 'CustomersController@create');
Route::post('/customers', 'CustomersController@store');
Route::get('/customers/{customer}', 'CustomersController@show');
Route::get('/customers/{customer}/edit', 'CustomersController@edit');
Route::patch('/customers/{customer}', 'CustomersController@update');
Route::delete('/customers/{customer}', 'CustomersController@destroy'); */

//Authentification routes
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

//Webpage routes
Route::get('/', 'WelcomeController');
Route::view('/about', 'about')->name('about');
Route::get('/blog', 'BlogController@index')->name('blog.index');
Route::get('/blog/{post}', 'BlogController@show')->name('blog.show');

//Contact routes
Route::get('/contact', 'ContactFormController@create')->name('contact.create');
Route::post('/contact', 'ContactFormController@store')->name('contact.store');

//Customers route
Route::resource('/customers', 'CustomersController');

//Posts routes
Route::resource('/posts', 'PostsController');

//Categories rotues
Route::resource('/categories', 'CategoriesController');

//Tags routes
Route::resource('/tags', 'TagsController');

//Comment routes
Route::post('/comments/{post}', 'PostCommentsController@store')->name('comments.store');
Route::get('/comments/{comment}/edit', 'PostCommentsController@edit')->name('comments.edit');
Route::patch('/comments/{comment}', 'PostCommentsController@update')->name('comments.update');
Route::delete('/comments/{comment}', 'PostCommentsController@destroy')->name('comments.destroy');