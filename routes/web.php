<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TagController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentController;
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

// ---------------------------------------Routes users -----------------------------------------
Route::get('/users', [UserController::class, 'index'])->name('users')->middleware(['admin']);
Route::get('/user/create', [UserController::class, 'create'])->name('user.create')->middleware(['admin']);
Route::post('/user/store', [UserController::class, 'store'])->name('user.store')->middleware(['admin']);
Route::get('/user/show/{user}', [UserController::class, 'show'])->name('user.show');
Route::get('/user/edit/{user}', [UserController::class, 'edit'])->name('user.edit')->middleware(['admin']);
Route::put('/user/update/{user}', [UserController::class, 'update'])->name('user.update')->middleware(['admin']);
Route::delete('/user/destroy/{user}', [UserController::class, 'destroy'])->name('user.destroy')->middleware(['admin']);


// ---------------------------------------Routes Articles -----------------------------------------
Route::get('/articles', [ArticleController::class, 'index'])->name('articles');
Route::get('/articles/validate', [ArticleController::class, 'validated'])->name('articles.validate')->middleware(['admin']);
Route::put('/article/approved/{article}', [ArticleController::class, 'approved'])->name('article.approved')->middleware(['admin']);
Route::get('/article/create', [ArticleController::class, 'create'])->name('article.create')->middleware(['admin']);
Route::post('/article/store', [ArticleController::class, 'store'])->name('article.store')->middleware(['admin']);
Route::get('/article/show/{article}', [ArticleController::class, 'show'])->name('article.show');
Route::get('/article/edit/{article}', [ArticleController::class, 'edit'])->name('article.edit')->middleware(['admin']);
Route::put('/article/update/{article}', [ArticleController::class, 'update'])->name('article.update')->middleware(['admin']);
Route::delete('/article/destroy/{article}', [ArticleController::class, 'destroy'])->name('article.destroy')->middleware(['admin']);

// ---------------------------------------Routes Comment -----------------------------------------
Route::get('/comments', [CommentController::class, 'index'])->name('comments');
Route::get('/comment/create', [CommentController::class, 'create'])->name('comment.create')->middleware(['auth']);
Route::post('/comment/store', [CommentController::class, 'store'])->name('comment.store')->middleware(['auth']);
Route::get('/comment/show/{comment}', [CommentController::class, 'show'])->name('comment.show');
Route::get('/comment/edit/{comment}', [CommentController::class, 'edit'])->name('comment.edit')->middleware(['auth']);
Route::put('/comment/update/{comment}', [CommentController::class, 'update'])->name('comment.update')->middleware(['auth']);
Route::delete('/comment/destroy/{comment}', [CommentController::class, 'destroy'])->name('comment.destroy')->middleware(['auth']);


// ---------------------------------------Routes catégories -----------------------------------------
// Route::get('/categories', [CategoryController::class, 'index'])->name('categories');
// Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
// Route::get('/category/store', [CategoryController::class, 'store'])->name('category.store');
// Route::get('/category/show/{category}', [CategoryController::class, 'show'])->name('category.show');
// Route::get('/category/edit/{category}', [CategoryController::class, 'edit'])->name('category.edit');
// Route::get('/category/update/{category}', [CategoryController::class, 'update'])->name('category.update');
// Route::get('/category/destroy/{category}', [CategoryController::class, 'destroy'])->name('category.destroy');


// Route::resource('tags', TagController::class)
//     ->only(['index', 'store', 'edit', 'update', 'destroy'])
//     ->middleware(['auth', 'verified']);


require __DIR__.'/auth.php';
