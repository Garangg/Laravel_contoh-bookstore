<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Book;
use App\Http\Resource\Book as BookResource;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->group(function (){
    Route::post('login', [AuthController::class, 'login']);
    Route::post('register', [AuthController::class, 'register']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::get('books', [BookController::class, 'index']);
    Route::get('books/{id}', [BookController::class, 'show']);
    Route::get('categories/random/{count}', [CategoryController::class, 'random']);
    Route::get('books/top/{count}',[BookController::class, 'top']);
    Route::get('categories', [CategoryController::class, 'index']);
    Route::get('categories/slug/{slug}',[CategoryController::class, 'slug']);
    Route::get('books/slug/{slug}',[BookController::class, 'slug']);
    Route::get('books/search/{keyword}',[BookController::class, 'search']);
    
    
});

// Route::get('/books', [BookController::class, 'index']);
// Route::get('/books/{id}', [BookController::class, 'show']);
