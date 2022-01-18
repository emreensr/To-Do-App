<?php

use App\Http\Controllers\ToDoController;
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

Route::get('/', function () {
    return view('welcome');
});



Route::get('/toDoList', [ToDoController::class, 'index'])->name('toDoList');

Route::get('changeStatus', [ToDoController::class, 'changeStatus'])->name('changeStatus');

Route::get('/toDoCreate', [ToDoController::class, 'toDoCreate'])->name('toDoCreate');
Route::post('/toDoSave', [ToDoController::class, 'toDoSave'])->name('toDoSave');

Route::get('/toDoEdit/{id}', [ToDoController::class, 'toDoEdit'])->name('toDoEdit');
Route::post('/toDoUpdate/{id}', [ToDoController::class, 'toDoUpdate'])->name('toDoUpdate');

Route::get('/toDoDelete/{id}', [ToDoController::class, 'toDoDelete'])->name('toDoDelete');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
