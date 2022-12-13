<?php

use App\Http\Controllers\NoteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::fallback(function(){
    return response()->json(['message' => 'Not Found.'], 404);
});

Route::resource('/notes',NoteController::class);
//Route::put('/notes/update/{id}',[NoteController::class,'update']);
//Route::delete('/notes/delete/{id}',[NoteController::class,'delete']);
