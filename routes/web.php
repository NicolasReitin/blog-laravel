<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/home', function () {
//     return view('home')->name('home');
// });

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



// ---------------------------------------Routes Articles -----------------------------------------
Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');
Route::get('/articles', [ArticleController::class, 'create'])->name('articles.create');
Route::get('/articles', [ArticleController::class, 'store'])->name('articles.store');
Route::get('/articles', [ArticleController::class, 'show'])->name('articles.show');
Route::get('/articles', [ArticleController::class, 'edit'])->name('articles.edit');
Route::get('/articles', [ArticleController::class, 'update'])->name('articles.update');
Route::get('/articles', [ArticleController::class, 'destroy'])->name('articles.destroy');




// ---------------------------------------Routes catégories -----------------------------------------



require __DIR__.'/auth.php';
