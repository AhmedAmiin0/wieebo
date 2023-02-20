<?php

declare(strict_types=1);


use Illuminate\Support\Facades\Route;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomain;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TenantController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;

/*
|--------------------------------------------------------------------------
| Tenant Routes
|--------------------------------------------------------------------------
|
| Here you can register the tenant routes for your application.
| These routes are loaded by the TenantRouteServiceProvider.
|
| Feel free to customize them however you want. Good luck!
|
*/

Route::middleware([
    'web',
    InitializeTenancyByDomain::class,
    PreventAccessFromCentralDomains::class,
])->group(function () {
    Route::controller(TaskController::class)->group(function () {
        Route::get('/', 'index')->name('tasks.index')->middleware('auth');
        Route::post('/',  'store')->name('tasks.store')->middleware('auth');
        Route::delete('/{task}',  'destroy')->name('tasks.destroy');
        Route::post('/import',  'importFromXlsx')->name('tasks.import')->middleware('auth');
    })
        ;;
    Route::resource('users', UserController::class)
        ->names('users')
        ->except(['show'])
        ->middleware('auth');
    Route::post('users/{user}/updatePassword', [UserController::class, 'updatePassword'])->name('users.updatePassword');
    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });
    require __DIR__ . '/auth.php';
});
