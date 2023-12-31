<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\v1\UserController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['prefix' => 'v1', 'namespace' => 'App\Http\Controllers\api\v1'],  function () {
    // Route::put('users/{user}/update', [UserController::class, 'update']);
    // Route::post('users/store', [UserController::class, 'store']);
    Route::post('/updateOrCreate', [UserController::class, 'updateOrCreate']);
    Route::delete('users/{id}', [UserController::class, 'deleteUser']);
});
