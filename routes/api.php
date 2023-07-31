<?php

use App\Http\Controllers\UserController;
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

Route::prefix('v1')->group(function(){

    //iterate through the v1 folder

    $dirIterator = new RecursiveDirectoryIterator(__DIR__ . '/api/v1');
    $it = new RecursiveIteratorIterator($dirIterator);

    while( $it -> valid()){
        if(!$it -> isDot() && $it -> isFile() && $it -> isReadable() && $it -> current()->getExtension() === 'php'){
            require $it -> key();
        }
        $it -> next();
    }
});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
