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
    return view('home');
});


Route::get('/test', function () {
    $ime = 'Magdalena';
    $prezime = 'Bilić';
    //return view('test', ['ime'=> $ime]);
    //return view('test')->with('ime', $ime);
    //return view('test')->with(compact('ime'));
    return view('test',compact('ime', 'prezime'));
});
/* POSTS*/ 
Route::get('/posts', 'PostController@index')->name('posts.index'); 

Route::get('/posts/{id}', 'PostController@show')->name('posts.show'); 

/* USERS*/ 

//prikazi sve usere
Route::get('/users', 'UserController@index')->name('users.index');
//prikazi formu za stvaraje usera
Route::get('/users/create', 'UserController@create')->name('users.create');
//spremi usera u bazu
Route::post('/users', 'UserController@store')->name('users.store');
Route::get('/users/{user}', 'UserController@show')->name('users.show'); 
Route::get('/users/{user}/edit', 'UserController@edit')->name('users.edit');
//spremi uređenog usera u bazu
Route::patch('/users/{user}', 'UserController@update')->name('users.update'); 
Route::delete('/users/{user}', 'UserController@destroy')->name('users.destroy'); 

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
