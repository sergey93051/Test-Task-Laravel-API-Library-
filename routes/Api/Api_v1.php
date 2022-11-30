<?php


use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\Auth\RegisterController;
use App\Http\Controllers\Api\HomeController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\Admin\BooksController;

Route::post('register',RegisterController::class);
Route::post('login', LoginController::class);

Route::controller(HomeController::class)->group(function(){
         
            Route::get('books',"index");
            Route::post('books/search',"search");
            Route::post('logout','logout')->middleware('auth:api');

});

Route::middleware('auth:api')->group( function () {
 
       Route::apiResource('orders', OrderController::class); 

       Route::prefix('admin')->middleware('admin:api')->group(function(){
            Route::apiResource('books', BooksController::class); 
       });
     
});