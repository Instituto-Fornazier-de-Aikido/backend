<?php

declare(strict_types=1);

use App\Core\Dojo\Infrastructure\Controllers\DojoController;
use App\Http\Controllers\ApiAuthController;
use Illuminate\Support\Facades\Route;

Route::post('login', [ApiAuthController::class, 'login']);
Route::post('register', [ApiAuthController::class, 'register']);
Route::post('refresh', [ApiAuthController::class, 'refreshToken']);

Route::group(['middleware' => ['auth:api']], static function (): void {
    Route::get('/me', [ApiAuthController::class, 'me']);
    Route::post('/logout', [ApiAuthController::class, 'logout']);
});

Route::name('Dojos - ')
    ->prefix('dojos')
    ->controller(DojoController::class)
    ->middleware('auth:api')
    ->group(function (): void {
        Route::get('/', 'index')->name('List');
        Route::get('/{uuid}', 'show')->name('Show');
        Route::post('/', 'store')->name('Create');
        Route::put('/{uuid}', 'update')->name('Update');
        Route::delete('/{uuid}', 'destroy')->name('Delete');
    });
