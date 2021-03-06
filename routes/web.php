<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    PostController,
    UserController,
    ViaCepController
};

require __DIR__ . '/auth.php';

Route::get('/', function () {
    return redirect()->route('users.index');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

Route::middleware(['auth'])->group(function () {

    Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
    Route::get('/users/{id}/posts', [PostController::class, 'show'])->name('posts.show');

    Route::get('users/notification', [UserController::class, 'notification'])->name('users.notification');
    Route::delete('users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
    Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show')->where('id', '[0-9]+');
    Route::post('/user', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [UserController::class, 'admin'])->name('admin');
});



// Viacep API
Route::get('viacep', [ViaCepController::class, 'index'])->name('viacep.index');
Route::post('viacep', [ViaCepController::class, 'index'])->name('viacep.index.post');
Route::get('viacep/{cep}', [ViaCepController::class, 'show'])->name('viacep.show');
