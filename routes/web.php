<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\TransactionController;
use App\Models\Book;
use App\Models\DetailTransactions;
use App\Models\Genre;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Auth;
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

//Admin Stuff
Route::middleware('role:admin')->group(function(){
    Route::get('/manageBook', [BookController::class, 'index']);
    Route::post('/insert', [BookController::class, 'insert']);
    Route::get('/edit/{id}', [BookController::class, 'edit']);
    Route::put('/update/{id}', [BookController::class, 'update']);
    Route::delete('/detail/{id}', [BookController::class, 'delete']);
    Route::get('/manageGenre', [GenreController::class, 'index']);
    Route::post('/insertGenre', [GenreController::class, 'insert']);
    Route::get('/manageGenre/detail/{id}', [GenreController::class, 'details']);
    Route::put('/updateGenre/{id}', [GenreController::class, 'update']);
    Route::delete('/manageGenre/delete/{id}', [GenreController::class, 'delete']);
    Route::get('/resetAdmin', [AuthController::class, 'resetIndex']);

    Route::get('/display', [AdminController::class, 'display']);
    Route::get('/detail/{id}', [AdminController::class, 'details']);
    Route::get('/profileAdmin', [AdminController::class, 'profile']);
    Route::put('/profileAdmin', [AdminController::class, 'profileEdit']);
    Route::get('/manageUser', [AdminController::class, 'userManage']);
    Route::get('/manageUser/detail/{id}', [AdminController::class, 'userDetails']);
    Route::put('/manageUser/detail/{id}', [AdminController::class, 'userDetailsUpdate']);
});

Route::get('/logout', [AuthController::class, 'logout']);
Route::put('/reset', [AuthController::class, 'resetPass']);
Route::get('/search', [BookController::class, 'search']);

//Member Stuff
Route::middleware('role:member')->group(function(){
    Route::get('/displayMember', [MemberController::class, 'index']);
    Route::get('/member/detail/{id}', [MemberController::class, 'details']);
    Route::post('/member/detail/{id}', [CartController::class, 'insert']);
    Route::get('/cart', [CartController::class, 'index']);
    Route::get('/update/member/detail/{id}', [MemberController::class, 'edit']);
    Route::put('/update/member/detail/{id}', [CartController::class, 'update']);
    Route::delete('/cart/delete/{id}', [CartController::class, 'delete']);
    Route::post('/checkout', [CartController::class, 'checkout']);
    Route::get('/history', [TransactionController::class, 'showHistory']);
    Route::get('/history/detail/{id}', [TransactionController::class, 'showHistoryDetails']);
    Route::get('/history/detail/book/{id}', [TransactionController::class, 'bookDetail']);
    Route::get('/resetMember', [AuthController::class, 'resetIndex']);
    Route::get('/profileMember', [MemberController::class, 'profile']);
    Route::put('/profileMember', [MemberController::class, 'profileEdit']);
});

//Login and register stuff (Available for guest only)
Route::get('/login', [AuthController::class, 'loginPage'])->middleware('guest');
Route::post('/login', [AuthController::class, 'login'])->middleware('guest');
Route::get('/register', [AuthController::class, 'registerPage'])->middleware('guest');
Route::post('/register', [AuthController::class, 'register'])->middleware('guest');
Route::get('/displayGuest', [GuestController::class, 'index'])->middleware('guest');
Route::get('/guest/detail/{id}', [GuestController::class, 'details'])->middleware('guest');
