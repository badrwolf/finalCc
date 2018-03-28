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

Route::get('/', function () {
    return view('ActVue');
});
Route::get('/add-act', function () {
    return view('Addpost');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/vueApp', 'LaureatController@home');
Route::get('/ActVue', 'ActualiteController@home');
Route::get('/showAct', 'ActualiteController@showAct');
Route::get('/Deleteact', 'ActualiteController@deleteAct');
Route::get('/view/:id', 'LaureatController@show');
Route::get('/view/:id', 'ActualiteController@show');
Route::resource('/laureats','LaureatController');
Route::resource('/actualites','ActualiteController');
Route::resource('/laureat','LaureatController@show');
Route::resource('/actualite','ActualiteController@show');
Route::resource('/add-act','ActualiteController@store');
