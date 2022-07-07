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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

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
Route::get('/dashboard/pages/{id?}', 'App\Http\Controllers\PageController@index')->name('pages');
Route::get('/dashboard/pages/edit/{id}', 'App\Http\Controllers\PageController@edit')->name('page-edit');
Route::post('/dashboard/pages/update/{id}', 'App\Http\Controllers\PageController@update');

// Contacts can only edit and update
Route::get('/dashboard/contacts', 'App\Http\Controllers\ContactController@edit')->name('contacts');
Route::post('/dashboard/contacts/update', 'App\Http\Controllers\ContactController@update');
// socials can be create/store/edit/update/delete
Route::get('/dashboard/socials/create', 'App\Http\Controllers\SocialController@create')->middleware(['auth']);
Route::post('/dashboard/socials/store', 'App\Http\Controllers\SocialController@store')->middleware(['auth']);
Route::get('/dashboard/socials/edit/{id}', 'App\Http\Controllers\SocialController@edit')->middleware(['auth']);
Route::post('/dashboard/socials/update/{id}', 'App\Http\Controllers\SocialController@update');
Route::get('/dashboard/socials/delete/{id}', 'App\Http\Controllers\SocialController@destroy')->middleware(['auth']);

require __DIR__.'/auth.php';
