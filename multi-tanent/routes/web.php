<?php

use App\Http\Controllers\TenantController;
use App\Models\Tenant;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [TenantController::class, 'index'])->name('tenant.index');
Route::post('/', [TenantController::class, 'store'])->name('tenant.store');
Route::delete('/{id}', [TenantController::class, 'destroy'])->name('tenant.destroy');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');


