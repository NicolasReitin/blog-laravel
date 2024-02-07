<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TagController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;

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
})->middleware(['admin'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



// ---------------------------------------Routes Articles -----------------------------------------
Route::get('/articles', [ArticleController::class, 'index'])->name('articles');
Route::get('/articles/create', [ArticleController::class, 'create'])->name('articles.create')->middleware(['admin']);
Route::post('/articles/store', [ArticleController::class, 'store'])->name('articles.store')->middleware(['admin']);
Route::get('/articles/show/{article}', [ArticleController::class, 'show'])->name('articles.show');
Route::get('/articles/edit/{article}', [ArticleController::class, 'edit'])->name('articles.edit')->middleware(['admin']);
Route::put('/articles/update/{article}', [ArticleController::class, 'update'])->name('articles.update')->middleware(['admin']);
Route::delete('/articles/destroy/{article}', [ArticleController::class, 'destroy'])->name('articles.destroy')->middleware(['admin']);


// ---------------------------------------Routes catégories -----------------------------------------
// Route::get('/categories', [CategoryController::class, 'index'])->name('categories');
// Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
// Route::get('/categories/store', [CategoryController::class, 'store'])->name('categories.store');
// Route::get('/categories/show/{categorie}', [CategoryController::class, 'show'])->name('categories.show');
// Route::get('/categories/edit/{categorie}', [CategoryController::class, 'edit'])->name('categories.edit');
// Route::get('/categories/update/{categorie}', [CategoryController::class, 'update'])->name('categories.update');
// Route::get('/categories/destroy/{categorie}', [CategoryController::class, 'destroy'])->name('categories.destroy');


// Route::resource('tags', TagController::class)
//     ->only(['index', 'store', 'edit', 'update', 'destroy'])
//     ->middleware(['auth', 'verified']);



require __DIR__.'/auth.php';
