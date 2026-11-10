<?php

declare(strict_types=1);

use App\Http\ExampleController;
use App\Http\FormController;
use App\Http\HomeController;
use App\Http\NotFoundController;
use Sahil\Http\Route;

/**
 * HTTP route table for the Vue starter-kit.
 *
 * The catch-all route is deliberately last: the router matches in registration
 * order, and it renders a 404 response for unknown paths.
 */
return [
    Route::get('/', [HomeController::class, 'response'])->name('home'),
    Route::get('/example', [ExampleController::class, 'response'])->name('example'),
    Route::get('/form', [FormController::class, 'show'])->name('form.show'),
    Route::post('/form', [FormController::class, 'submit'])->name('form.submit'),
    Route::get('/{path:.*}', [NotFoundController::class, 'response'])->name('not-found'),
];