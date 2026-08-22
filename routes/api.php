<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ImovelApiController;
use App\Http\Controllers\Api\EventController;
use App\Http\Controllers\Api\ProcessReportController;
use App\Http\Controllers\Api\PostApiController;

Route::get('imoveis', [ImovelApiController::class, 'index']);

/*
|--------------------------------------------------------------------------
| API - Módulo Jurídico (Calendário)
|--------------------------------------------------------------------------
*/
Route::prefix('legal')->group(function () {
    Route::get('/events', [EventController::class, 'index']);
    Route::get('/events/types', [EventController::class, 'types']);
    Route::get('/events/{id}', [EventController::class, 'show']);
    Route::post('/events', [EventController::class, 'store']);
    Route::put('/events/{id}', [EventController::class, 'update']);
    Route::patch('/events/{id}/date', [EventController::class, 'updateDate']);
    Route::delete('/events/{id}', [EventController::class, 'destroy']);

    // Relatórios PDF
    Route::get('/reports/processes', [ProcessReportController::class, 'index']);
    Route::get('/reports/processes/{id}', [ProcessReportController::class, 'show']);
    Route::get('/reports/deadlines', [ProcessReportController::class, 'deadlines']);
});

/*
|--------------------------------------------------------------------------
| API - Módulo Posts
|--------------------------------------------------------------------------
*/
Route::prefix('posts')->group(function () {
    // Posts
    Route::get('/', [PostApiController::class, 'index']);
    Route::get('/types', [PostApiController::class, 'types']);
    Route::get('/highlighted', [PostApiController::class, 'highlighted']);
    Route::get('/recent', [PostApiController::class, 'recent']);
    Route::get('/{id}', [PostApiController::class, 'show'])->where('id', '[0-9]+');
    Route::get('/slug/{slug}', [PostApiController::class, 'showBySlug']);
    Route::post('/', [PostApiController::class, 'store']);
    Route::put('/{id}', [PostApiController::class, 'update']);
    Route::delete('/{id}', [PostApiController::class, 'destroy']);
});

Route::prefix('categories')->group(function () {
    Route::get('/', [PostApiController::class, 'categories']);
    Route::get('/{slug}', [PostApiController::class, 'categoryBySlug']);
    Route::post('/', [PostApiController::class, 'storeCategory']);
    Route::put('/{id}', [PostApiController::class, 'updateCategory']);
    Route::delete('/{id}', [PostApiController::class, 'destroyCategory']);
});
