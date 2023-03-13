<?php

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
/:id|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

$nscp = "App\Http\Controllers";
Route::get('personal/{a}/{any}',$nscp.'\PersonalController@getData');
Route::get('personal-data',$nscp.'\PersonalController@personal');

Route::post('personal',function(Request $request){
    return "ini halaman personal ini via api.php";
});

Route::put('personal',function(Request $request){
    return "ini halaman personal ini via api.php";
});

Route::delete('personal',function(Request $request){
    return "ini halaman personal ini via api.php";
});

Route::post('sendData', $nscp. '\PersonalController@receiveDataFromPostMethod');
Route::delete('delete/{id}', $nscp. '\PersonalController@delete');
Route::post('update', $nscp. '\PersonalController@update');

