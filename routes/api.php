<?php

use App\Http\Controllers\Api\V1\InvoiceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\UserController;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');


Route::prefix('v1')->group(function(){

    //Usuarios
    Route::get('/users', [UserController::class,'index']);
    Route::get('/users/{user}', [UserController::class,'show']);


    Route::apiResource('invoices', InvoiceController::class);
    //Invoices
//     Route::get('/invoices', [InvoiceController::class,'index']);
//     Route::get('/invoices/{invoice}', [InvoiceController::class,'show']);
//     // Route::get('/invoices/{invoice}', [InvoiceController::class,'store']);
//     Route::post('/invoices', [InvoiceController::class,'store']);
//     Route::put('/invoices/{invoice}', [InvoiceController::class,'update']);
//     Route::delete('/invoices/{invoice}', [InvoiceController::class,'destroy']);

});



