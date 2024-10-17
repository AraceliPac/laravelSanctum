<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Laravel\Sanctum\Http\Controllers\CsrfCookieController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::middleware("auth:sanctum")->group(function () {
    Route::get("/posts", [PostController::class, "index"]);
    Route::post("/post", [PostController::class, "createPost"]);
});

Route::get('sanctum/csrf-cookie', [CsrfCookieController::class, 'show']);

Route::post("/register", [AuthController::class, "register"]);
Route::get("/login", [AuthController::class, "login"]);
