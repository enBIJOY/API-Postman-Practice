<?php 


use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\PostController;
use Illuminate\Support\Facades\Route;

// Public
Route::post('/register',[AuthController::class,'register']);
Route::post('/login',[AuthController::class,'login']);

// Protected
Route::middleware('auth:sanctum')->group(function(){

    Route::get('/profile',[AuthController::class,'profile']);
    Route::post('/logout',[AuthController::class,'logout']);

    // Users
    Route::get('/users',[UserController::class,'index']);
    Route::get('/users/{id}',[UserController::class,'show']);
    Route::put('/users/{id}',[UserController::class,'update']);
    Route::delete('/users/{id}',[UserController::class,'destroy']);

    // Posts
    Route::get('/posts',[PostController::class,'index']);
    Route::post('/posts',[PostController::class,'store']);
    Route::get('/posts/{id}',[PostController::class,'show']);
    Route::put('/posts/{id}',[PostController::class,'update']);
    Route::delete('/posts/{id}',[PostController::class,'destroy']);
});


// Route::get('/posts', [PostController::class, 'index']);       // GET ALL
// Route::get('/posts/{id}', [PostController::class, 'show']);   // GET SINGLE
// Route::post('/posts', [PostController::class, 'store']);     // CREATE
// Route::put('/posts/{id}', [PostController::class, 'update']); // UPDATE
// Route::delete('/posts/{id}', [PostController::class, 'destroy']); // DELETE