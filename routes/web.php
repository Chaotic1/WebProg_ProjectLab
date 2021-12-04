<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\PageController;
use App\Models\Book;
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


Route::get('/login', [PageController::class, 'login']);
Route::get('/register', [PageController::class, 'register']);
Route::get('/guestpage', [PageController::class, 'guest']);
Route::get('/memberpage', [PageController::class, 'member']);
Route::get('/adminpage', [PageController::class, 'admin']);

Route::get('/manageBook', [BookController::class, 'index']);
Route::post('/insert', [BookController::class, 'insert']);
Route::get('/display', [BookController::class, 'display']);
Route::get('/detail/{id}', [BookController::class, 'details']);
Route::get('/edit/{id}', [BookController::class, 'edit']);
Route::put('/update/{id}', [BookController::class, 'update']);
