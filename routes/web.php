<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Models\User;
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
    //return view('welcome');
    return view('auth/login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/users', [App\Http\Controllers\ListUserController::class, 'index'])->name('users.index');
/*
Route::get('/users/update/{id}', [
    'uses' => [App\Http\Controllers\ListUserController::class, 'createForm']
]);
// Post form data
Route::post('/users/update/{id}', [
    'uses' => [App\Http\Controllers\ListUserController::class, 'updateUser'],
    'as' => 'users.update'
]);*/

Route::get('/users/edit/{id}', [App\Http\Controllers\ListUserController::class, 'edit'])->name('listuser.edit');
Route::post('/users/update/{id}', [App\Http\Controllers\ListUserController::class, 'updateUser'])->name('listuser.update');
Route::delete('/users/delete/{id}', [App\Http\Controllers\ListUserController::class, 'deleteUser'])->name('listuser.delete');