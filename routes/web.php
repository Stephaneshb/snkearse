<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SneakersController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\WishlistController;

Route::get('/', function () {
    return view('welcome');
});



Route::get('/sneakers', [SneakersController::class, 'index']);

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
 


Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return 'Bienvenue sur votre tableau de bord !';
    })->name('dashboard');
});

// Voir la wish list
Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist.index');

// Ajouter une sneaker à la wish list
Route::post('/wishlist/add', [WishlistController::class, 'add'])->name('wishlist.add');

// Retirer une sneaker de la wish list
Route::post('/wishlist/remove', [WishlistController::class, 'remove'])->name('wishlist.remove');

Route::get('/sneakers', [SneakersController::class, 'index'])->name('sneakers.index');
Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist.index');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
