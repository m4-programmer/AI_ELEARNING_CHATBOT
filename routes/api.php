<?php

use App\Http\Controllers\BotController as BotControllerAlias;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::prefix('v1')->group(function (){
    Route::match(['get','post'], '/chatbot', [BotControllerAlias::class,'chat']);
});
//Route::get('/test', function (){
//    return 'yes';
//});
