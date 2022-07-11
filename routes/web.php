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

// Route::get('/', function () {
//     return view('main');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');
require __DIR__.'/auth.php';
Route::get('/dashboard/posts/add', 'App\Http\Controllers\PostController@create')->middleware(['auth'])->name('posts/add');
Route::post('/dashboard/posts/create', 'App\Http\Controllers\PostController@store')->middleware(['auth']);
Route::get('/dashboard/posts/edit/{id}', 'App\Http\Controllers\PostController@edit')->middleware(['auth'])->name('posts/edit');
Route::post('/dashboard/posts/update', 'App\Http\Controllers\PostController@update')->middleware(['auth']);
Route::get('/dashboard/posts/delete/{id}', 'App\Http\Controllers\PostController@destroy')->middleware(['auth']);
Route::get('/dashboard/posts/{id?}', 'App\Http\Controllers\PostController@index')->middleware(['auth'])->name('posts');

Route::post('/dashboard/swiper/add/', 'App\Http\Controllers\SwiperController@create')->middleware(['auth']);
Route::post('/dashboard/swiper/create', 'App\Http\Controllers\SwiperController@store')->middleware(['auth']);
Route::get('/dashboard/swiper/delete/{id}', 'App\Http\Controllers\SwiperController@destroy')->middleware(['auth']);
Route::get('/dashboard/swiper/edit/{id}', 'App\Http\Controllers\SwiperController@edit')->middleware(['auth']);
Route::post('/dashboard/swiper/update', 'App\Http\Controllers\SwiperController@update')->middleware(['auth']);

// 
Route::get('/dashboard/pages/{id?}', 'App\Http\Controllers\PageController@index')->middleware(['auth'])->name('pages');
Route::get('/dashboard/pages/edit/{id}', 'App\Http\Controllers\PageController@edit')->middleware(['auth'])->name('page-edit');
Route::post('/dashboard/pages/update/{id}', 'App\Http\Controllers\PageController@update')->middleware(['auth']);

// Contacts can only edit and update
Route::get('/dashboard/contacts', 'App\Http\Controllers\ContactController@edit')->middleware(['auth'])->name('contacts');
Route::post('/dashboard/contacts/update', 'App\Http\Controllers\ContactController@update')->middleware(['auth']);
// socials can be create/store/edit/update/delete
Route::get('/dashboard/socials/create', 'App\Http\Controllers\SocialController@create')->middleware(['auth']);
Route::post('/dashboard/socials/store', 'App\Http\Controllers\SocialController@store')->middleware(['auth']);
Route::get('/dashboard/socials/edit/{id}', 'App\Http\Controllers\SocialController@edit')->middleware(['auth']);
Route::post('/dashboard/socials/update/{id}', 'App\Http\Controllers\SocialController@update');
Route::get('/dashboard/socials/delete/{id}', 'App\Http\Controllers\SocialController@destroy')->middleware(['auth']);
// services
Route::get('/dashboard/services','App\Http\Controllers\ServiceController@index')->middleware(['auth'])->name("services");
Route::get('/dashboard/services/create','App\Http\Controllers\ServiceController@create')->middleware(['auth']);
Route::post('/dashboard/services/store','App\Http\Controllers\ServiceController@store')->middleware(['auth']);
Route::get('/dashboard/services/edit/{id}', 'App\Http\Controllers\ServiceController@edit')->middleware(['auth']);
Route::post('dashboard/services/update','App\Http\Controllers\ServiceController@update')->middleware(['auth']);
Route::get('/dashboard/services/destroy/{id}','App\Http\Controllers\ServiceController@destroy')->middleware(['auth']);


Route::get('/','App\Http\Controllers\FrontController@main');
Route::get('/{slug}','App\Http\Controllers\FrontController@another');