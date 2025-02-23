<?php

declare(strict_types=1);

use App\Modules\Dojo\Infrastructure\Controllers\DojoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', static fn (Request $request) => $request->user())->middleware('auth:sanctum');

Route::name('dojos.')
    ->prefix('dojos')
    ->controller(DojoController::class)
    ->group(function (): void {
        Route::get('/', 'index');
        Route::get('/{uuid}', 'show');
        Route::post('/', 'store');
        Route::put('/{uuid}', 'update');
        Route::delete('/{uuid}', 'destroy');
    });
