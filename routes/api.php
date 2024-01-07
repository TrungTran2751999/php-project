<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Api\CategoriesController;
use App\Http\Controllers\Api\TournamentApi;
use App\Http\Controllers\Api\CategoryApi;
use App\Http\Controllers\Api\OrganizerApi;
use App\Http\Controllers\Api\UserApi;
use App\Http\Controllers\AdminController;
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
//============================API==============================
Route::prefix("/api")->group(function(){
    // ==============USER==============
    Route::prefix("/user")->group(function(){
        Route::get("/",[UserApi::class,'getAll'])->middleware("role:ADMIN");
        Route::post("/update",[UserApi::class,'update']);
        Route::get("/{id}/{guid}",[UserApi::class,'getById']);
        
        Route::post("/login",[UserApi::class,'login']);
        Route::get("/logout",[UserApi::class,'logout']);
        
    });
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
});

//==========================ROUTE===============================
//==========================ADMIN===============================
Route::prefix('/admin')->group(function(){
    Route::get('/login', [AdminController::class,'login']);
    Route::get('/', [AdminController::class,'index'])->middleware("role:ADMIN");
    Route::prefix('/tournament')->group(function(){
        Route::get("/chua-duyet",[AdminController::class,'tournamentChuaDuyet']);
        Route::get("/da-duyet",[AdminController::class,'tournamentDaDuyet']);
    });

    Route::prefix('/category')->group(function(){
        Route::get('/', [AdminController::class,'category']);
        Route::get('/create', [AdminController::class,'createCategory']);
        Route::get('/update', [AdminController::class,'updateCategory']);
    });

    Route::prefix('/organizer')->group(function(){
        Route::get('/', [AdminController::class,'organizer']);
        Route::get('/create', [AdminController::class,'createOrganizer']);
        Route::get('/update', [AdminController::class,'updateOrganizer']);
    });
});