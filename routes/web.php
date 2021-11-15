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


Route::get('/signin', function(){
    return view('signIn');
});

Route::get('/users/{id}', function ($id) {
    return 'This is the page of User '.$id;
});

Route::get('/landGuest', function () {
    return view('landingGuest');
});



Route::prefix('/admin')->group(function(){
    Route::get('/home', function () {
        echo "Admin Home Page";
    });

    Route::get('/setting', function () {
        echo "Admin Setting Page";
    });

    Route::get('/hello', function () {
        echo "Iya, bisa";
    });
    
    Route::get('/landing', function () {
        return view('landing');
    });

});

