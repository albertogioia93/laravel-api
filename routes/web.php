<?php

// use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\TypeController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function(){
    return view('welcome');
});
// Route::get('/dashboard', function () {
    //     return view('dashboard');
    // })->middleware(['auth', 'verified'])->name('dashboard');
    
Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('posts', PostController::class)->parameters(['posts'=>'post:slug']);
    Route::resource('types', TypeController::class)->parameters(['types'=>'type:slug']);

    // comment delete
    Route::delete('comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');

});

require __DIR__.'/auth.php';
