<?php

use App\Http\Controllers\AccesoController;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\AccessAuditMiddleware;
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



Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('login', [AuthController::class, 'login'])->name('login');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/', [AccesoController::class, 'index'])->name('index')->middleware('auth');

Route::group(['middleware' => ['auth', 'audit']], function () {
    Route::get('/revisar', [AccesoController::class, 'otherViews'])->name('revisar');
    Route::get('/validar', [AccesoController::class, 'otherViews'])->name('validar');
    Route::get('/crear', [AccesoController::class, 'otherViews'])->name('crear');
});



