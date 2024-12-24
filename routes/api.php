<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Lightit\Backoffice\Employee\App\Controllers\ListEmployeeController;
use Lightit\Backoffice\Employee\App\Controllers\StoreEmployeeController;
use Lightit\Backoffice\Task\App\Controllers\GetTaskController;
use Lightit\Backoffice\Task\App\Controllers\ListTaskController;
use Lightit\Backoffice\Task\App\Controllers\StoreTaskController;
use Lightit\Backoffice\Task\App\Controllers\UpdateTaskController;
use Lightit\Backoffice\Users\App\Controllers\DeleteUserController;
use Lightit\Backoffice\Users\App\Controllers\GetUserController;
use Lightit\Backoffice\Users\App\Controllers\ListUserController;
use Lightit\Backoffice\Users\App\Controllers\StoreUserController;

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

/*
|--------------------------------------------------------------------------
| Users Routes
|--------------------------------------------------------------------------
*/
Route::prefix('users')
    ->middleware([])
    ->group(static function () {
        Route::get('/', ListUserController::class);
        Route::get('/{user}', GetUserController::class)->withTrashed();
        Route::post('/', StoreUserController::class);
        Route::delete('/{user}', DeleteUserController::class);
    });

Route::prefix('employees')
    ->group(static function () {
        Route::get('/', ListEmployeeController::class);
        Route::post('/', StoreEmployeeController::class)->name('employees');
    });

Route::prefix('tasks')
    ->middleware([])
    ->group(static function () {
        Route::get('/', ListTaskController::class);
        Route::get('/{task}', GetTaskController::class);
        Route::post('/', StoreTaskController::class)->name('tasks');
        Route::put('/{task}', UpdateTaskController::class);
    });
