<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::prefix('/admin')->group(function(){
    Route::get('/', [AdminController::class,'index']);
    Route::prefix('/tournament')->group(function(){
        Route::get("/chua-duyet",[AdminController::class,'tournamentChuaDuyet']);
        Route::get("/da-duyet",[AdminController::class,'tournamentDaDuyet']);
    });
});

Route::get('/', function (Request $request) {
    return view("welcome");
});

// Route::prefix('about')->group(function(){
//     Route::get("/",[AboutController::class, 'index']);
//     Route::get("/categories/{id}",[AboutController::class,'categories']);
// });

