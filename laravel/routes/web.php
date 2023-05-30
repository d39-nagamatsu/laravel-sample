<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\FolderController;
use App\Http\Controllers\TaskController;


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

Route::middleware('auth')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');

    Route::get('/folders/create', [FolderController::class, 'showCreateForm'])->name('folders.create');
    Route::post('/folders/create', [FolderController::class, 'create']);

    Route::get('/folders/{folder_id}/tasks', [TaskController::class, 'index'])->name('tasks.index');

    Route::get('/folders/{folder_id}/tasks/create', [TaskController::class, 'showCreateForm'])->name('tasks.create');
    Route::post('/folders/{folder_id}/tasks/create', [TaskController::class, 'create']);

    Route::get('/folders/{folder_id}/tasks/{task_id}/edit', [TaskController::class, 'showEditForm'])->name('tasks.edit');
    Route::post('/folders/{folder_id}/tasks/{task_id}/edit', [TaskController::class, 'edit']);

    /*Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard');*/

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
