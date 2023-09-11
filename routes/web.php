<?php

use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::group(['prefix' => 'access', 'as' => 'access.'], function () {
        Route::resources([
            'roles' => RoleController::class,
            'permissions' => PermissionController::class,
            'users' => UserController::class,

        ]);
    });

    Route::group(['prefix' => 'team', 'as' => 'team.'], function () {
        // Display a list of all teams
        Route::get('create', [TeamController::class, 'index'])->name('index');

        //store
        Route::post('store', [TeamController::class, 'store'])->name('store');

    
        // Update a specific team in the database
        Route::put('{team}', [TeamController::class, 'update'])->name('update');
    
        // Remove a specific team from the database
        Route::delete('{team}', [TeamController::class, 'destroy'])->name('destroy');
    });
    
require __DIR__.'/auth.php';
