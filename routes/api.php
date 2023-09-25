<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Business;
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

Route::post('/business/search',function(Request $request){
    //TODO your api
    //https://laravel.com/docs/10.x/queries#main-content
    $search_param = $request->input('search_param');

    $businesses = Business::
    where('name','like',"%{$search_param}%")
    ->limit(10)
    ->get();

    return response($businesses);
});