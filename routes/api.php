<?php

use App\Http\Controllers\Api\ProjectController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TypeController;
use App\Http\Controllers\Api\TechnologyController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('posts', [ProjectController::class, 'index']);
Route::get('posts/{slug}', [ProjectController::class, 'show']);

//types index
Route::get('types', [TypeController::class, 'index']);

//type show
Route::get('types/{slug}', [TypeController::class, 'show']);

//technologies index
Route::get('technologies', [TechnologyController::class, 'index']);

//technology show
Route::get('technologies/{slug}', [TechnologyController::class, 'show']);
