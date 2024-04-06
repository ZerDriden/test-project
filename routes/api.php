<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\EmployeeController;
use App\Http\Controllers\Api\V1\DepartmentController;

Route::group(['prefix' => 'v1'], function () {
    $routes = ['department' => DepartmentController::class, 'employee' => EmployeeController::class];

    foreach ($routes as $alias => $controller) {
        Route::controller($controller)
            ->prefix($alias . 's')
            ->name($alias . 's.')
            ->group(function () use ($alias) {
                Route::get('/', 'index')->name('index');
                Route::post('/', 'store')->name('store');

                Route::group(['prefix' => '{' . $alias . '}'], function () {
                    Route::put('/', 'update')->name('update');
                    Route::delete('/', 'destroy')->name('destroy');
                });
            });
    }
});
