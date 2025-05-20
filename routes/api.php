<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ShippingStatusController;
use App\Http\Controllers\UserController; 
/*
|---------------------------------------------------------------------------  
| API Routes  
|---------------------------------------------------------------------------  
|  
| Aquí es donde puedes registrar las rutas de la API para tu aplicación.  
| Estas rutas son cargadas por el RouteServiceProvider y todas ellas serán  
| asignadas al grupo de middleware "api". ¡Haz algo genial!  
|  
*/

// Rutas para productos
Route::get('/products', [ProductController::class, 'index']);
Route::post('/products', [ProductController::class, 'store']);
Route::delete('/products/{id}', [ProductController::class, 'destroy']);
Route::get('/products/season/{season}', [ProductController::class, 'getBySeason']);

// Rutas para marcas (brands)
Route::get('/brands', [BrandController::class, 'index']);
Route::post('/brands', [BrandController::class, 'store']);
Route::get('/brands/{id}', [BrandController::class, 'show']);
Route::put('/brands/{id}', [BrandController::class, 'update']);
Route::delete('/brands/{id}', [BrandController::class, 'destroy']);

// Rutas para categorías
Route::get('/categories', [CategoryController::class, 'index']);
Route::post('/categories', [CategoryController::class, 'store']);
Route::get('/categories/{id}', [CategoryController::class, 'show']);
Route::put('/categories/{id}', [CategoryController::class, 'update']);
Route::delete('/categories/{id}', [CategoryController::class, 'destroy']);

// Rutas para el estado de envío (ShippingStatus)
Route::get('/shipping-statuses', [ShippingStatusController::class, 'index']);
Route::post('/shipping-statuses', [ShippingStatusController::class, 'store']);
Route::get('/shipping-statuses/{id}', [ShippingStatusController::class, 'show']);
Route::put('/shipping-statuses/{id}', [ShippingStatusController::class, 'update']);
Route::delete('/shipping-statuses/{id}', [ShippingStatusController::class, 'destroy']);

// Rutas para usuarios (users)
Route::get('/users', [UserController::class, 'index']);
Route::post('/users', [UserController::class, 'store']);
Route::get('/users/{id}', [UserController::class, 'show']);
Route::put('/users/{id}', [UserController::class, 'update']);
Route::delete('/users/{id}', [UserController::class, 'destroy']);

// Rutas por defecto de Laravel (auth:sanctum) -- No se requiere
Route::get('/user', function (Request $request) {
    return $request->user();
});
