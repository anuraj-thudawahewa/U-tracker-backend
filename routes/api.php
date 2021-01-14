<?php


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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::group([
    'prefix'=>'user',
    'middleware'=>'api',
    //'namespace'=>'User',
],
function(){
    Route::post('register','App\Http\Controllers\User\AuthController@register');
    Route::post('login','App\Http\Controllers\User\AuthController@login');
    //Route::post('add-user','App\Http\Controllers\User\AuthController@addUser');
    Route::get('getlocation','App\Http\Controllers\vehicles@getLocation');
    Route::post('savevehicle','App\Http\Controllers\vehicles@saveVehicle');
    //Route::post('login','AuthController@login');
});




