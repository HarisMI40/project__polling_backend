<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\PollController;
use App\Http\Controllers\VoteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', [AuthController::class,'login']);
Route::post('register', [AuthController::class,'register']);
Route::get('poll', [PollController::class,'index']);
Route::get('poll/{id}', [PollController::class,'show']);
Route::post('poll/create', [PollController::class,'store']);
Route::post('poll/delete', [PollController::class,'destroy']);
Route::post('vote/store', [VoteController::class,'store']);
Route::middleware(['auth:api'])->group(function(){
    Route::get('user', [AuthController::class,'index']);
});