<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Api\CategoriesController;
use App\Http\Controllers\Api\TournamentApi;
use App\Http\Controllers\Api\CategoryApi;
use App\Http\Controllers\Api\OrganizerApi;
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
Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', [AuthController::class,'login']);
    // Route::post('logout', 'AuthController@logout');
    // Route::post('refresh', 'AuthController@refresh');
    Route::get('profile', [AuthController::class,'profile']);

});
// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::get("/users",[UserController::class,'getAll'])->middleware('role:admin,user');

// Route::prefix("/category")->group(function(){
//     Route::get("/",[CategoriesController::class,'getAll']);
//     Route::post("/",[CategoriesController::class,'create']);
//     Route::put("/{id}",[CategoriesController::class,'update']);
// })->middleware('role:admin');
// ==============CATEGORY==============
Route::prefix("/category")->group(function(){
    Route::get("/",[CategoryApi::class,'getAll']);
    Route::get("/{id}",[CategoryApi::class,'getById']);

    Route::post("/",[CategoryApi::class,'create']);
    Route::post("/update",[CategoryApi::class,'update']);
});
// ==============ORGANIZER==============
Route::prefix("/organizer")->group(function(){
    Route::get("/",[OrganizerApi::class,'getAll']);
    Route::get("/{id}",[OrganizerApi::class,'getById']);

    Route::post("/",[OrganizerApi::class,'create']);
    Route::post("/update",[OrganizerApi::class,'update']);
});
Route::prefix("/tournament")->group(function(){
   Route::get("/",[TournamentApi::class,'getAll']);
});
