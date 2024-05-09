<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UniversityController;
use App\Http\Controllers\CritereController;
use App\Http\Controllers\ClassementController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/dashboard', [HomeController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboardad', [HomeController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboardad');

Route::get('/dashboardadmin', [HomeController::class, 'open'])->name('admin.dashboardadmin');
Route::get('/dashboarduser', [HomeController::class, 'openuser'])->name('utilisateur.dashboarduser');
Route::get('/universites', [UniversityController::class, 'index'])->name('admin.universites.index');
Route::get('/universites', [UniversityController::class, 'indexu'])->name('utilisateur.universites.indexu');
Route::prefix('admin')->group(function () {
    Route::get('/universites', [UniversityController::class, 'index'])->name('admin.universites.index');
    
Route::post('/universites/create', [UniversityController::class, 'store'])->name('admin.universites.store');
Route::get('/criteres', [CritereController::class, 'index'])->name('admin.criteres.index');
Route::get('/comments', [CommentController::class, 'index'])->name('admin.comments.index');

});

Route::get('/admin/universites/{university}/edit', [UniversityController::class, 'edit'])->name('admin.universites.edit');
Route::put('/admin/universites/{university}', [UniversityController::class, 'update'])->name('admin.universites.update');
Route::delete('/admin/universites/{university}', [UniversityController::class, 'destroy'])->name('admin.universites.destroy');

Route::get('/admin/criteres/{critere}/edit', [CritereController::class, 'edit'])->name('admin.criteres.edit');
Route::put('/admin/criteres/{university}', [CritereController::class, 'update'])->name('admin.criteres.update');
Route::delete('/admin/criteres/{critere}', [CritereController::class, 'destroy'])->name('admin.criteres.destroy');
Route::post('/criteres/create', [CritereController::class, 'store'])->name('admin.criteres.store');

Route::get('/admin/comments/{comment}/edit', [CommentController::class, 'edit'])->name('admin.comments.edit');
Route::put('/admin/comments/{comment}', [CommentController::class, 'update'])->name('admin.comments.update');
Route::delete('/admin/comments/{comment}', [CommentController::class, 'destroy'])->name('admin.comments.destroy');
Route::post('/comments/create', [CommentController::class, 'store'])->name('admin.comments.store');

Route::get('/utilisateur/criteres', [NoteController::class, 'indexu'])->name('utilisateur.criteres.indexu');
Route::get('/utilisateur/criteresstore', [CritereController::class, 'storeno'])->name('utilisateur.criteres.storeno');
Route::post('utilisateur/criteresstore', [CritereController::class, 'storeno'])->name('utilisateur.criteres.storeno');
Route::get('/utilisateur/comments', [CommentController::class, 'store'])->name('utilisateur.comments.store');
Route::post('/utilisateur/commentsstore', [CommentController::class, 'store'])->name('utilisateur.comments.store');
Route::get('/classement', [ClassementController::class, 'index'])->name('utilisateur.classement.index');
Route::post('/classement', [ClassementController::class, 'show'])->name('utilisateur.classement.show');

Route::prefix('utilisateur')->group(function () {
    Route::get('/universites', [UniversityController::class, 'indexu'])->name('utilisateur.universites.indexu');
    Route::get('/comments', [CommentController::class, 'indexu'])->name('utilisateur.comments.indexu');

});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
