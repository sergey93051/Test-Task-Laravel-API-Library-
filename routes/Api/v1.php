<?php


use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\Auth\RegisterController;
use App\Http\Controllers\Api\BooksController;
use App\Http\Controllers\BuyerController;

Route::post('register',RegisterController::class);
Route::post('login', LoginController::class);

Route::controller(BooksController::class)->group(function(){

            Route::get('books',"show");
            Route::post('books/search',"search");
});

Route::middleware('auth:api')->group( function () {
      
    Route::controller(BuyerController::class)->group(function(){

         Route::get('books/showBuyer',"show");
         Route::get('books/showBuyerId/{id}',"showBuyerId");
         Route::post('books/buy',"buyBooks");
        
    });   
   
    Route::post('logout',[BooksController::class,'logout']);

});