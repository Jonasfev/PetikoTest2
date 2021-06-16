<?php

use App\Http\Controllers\pedidosController;
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

// Rotas

Route::get('/newTask', function () {
    return view('_partials.newTask');
})->name("newTask");

Route::get('/', [pedidosController::class, 'show'])->name("taskList");

Route::post('/addTask', [pedidosController::class, 'store'])->name('addTask');

Route::delete('/deleteTask/{id}', [pedidosController::class, 'destroy'])->name("deleteTask");