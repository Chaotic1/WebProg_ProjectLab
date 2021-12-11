<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\PageController;
use App\Models\Book;
use App\Models\Genre;
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



Route::get('/register', [PageController::class, 'register']);
Route::get('/guestpage', [PageController::class, 'guest']);
Route::get('/memberpage', [PageController::class, 'member']);
Route::get('/adminpage', [PageController::class, 'admin']);


//Admin Stuff
Route::get('/manageBook', [BookController::class, 'index']);
Route::post('/insert', [BookController::class, 'insert']);
Route::get('/display', [BookController::class, 'display']);
Route::get('/detail/{id}', [BookController::class, 'details']);
Route::get('/edit/{id}', [BookController::class, 'edit']);
Route::put('/update/{id}', [BookController::class, 'update']);
Route::delete('/detail/{id}', [BookController::class, 'delete']);

Route::get('/manageGenre', [GenreController::class, 'index']);
Route::post('/insertGenre', [GenreController::class, 'insert']);
Route::get('/manageGenre/detail/{id}', [GenreController::class, 'details']);
Route::put('/updateGenre/{id}', [GenreController::class, 'update']);

//Member Stuff
Route::get('displayMember', [MemberController::class, 'index']);
Route::get('member/detail/{id}', [MemberController::class, 'details']);

//Guest Stuff
Route::get('displayGuest', [GuestController::class, 'index']);
Route::get('guest/detail/{id}', [GuestController::class, 'details']);

//Login and register stuff
Route::get('/login', [AuthController::class, 'loginPage']);
Route::post('login', [AuthController::class, 'login']);