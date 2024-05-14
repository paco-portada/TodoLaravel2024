<?php
  
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
  
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\TasksController;

use App\Http\Controllers\Api\MailController;
  
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/
  
Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);
     
Route::middleware('auth:sanctum')->group( function () {
    Route::resource('tasks', TasksController::class);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('email', [MailController::class, 'sendEmail']);       
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
