<?php

use App\Http\Controllers\ResignationCalculationController;
use Illuminate\Support\Facades\Route;

Route::middleware('api')->prefix('v1')->group(function (): void {
    Route::post('/resignation-calculations', ResignationCalculationController::class)
        ->name('api.resignation-calculations.store');
});
