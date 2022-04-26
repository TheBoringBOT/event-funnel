<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\UserController;

// get all products
Route::get( '/products', [ ProductController::class, 'apiAllProducts' ] );
// get single product
Route::get( '/products/{slug}', [ ProductController::class, 'apiSingleProducts' ] );
// post purchase
Route::post( '/purchase', [ UserController::class, 'purchase' ] );


Route::middleware( 'auth:sanctum' )->get( '/user', function ( Request $request ) {
	return $request->user();
} );
