<?php

use App\Http\Controllers\UserController;
use App\Models\User;
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
})->name('home');

Route::get('/admin', function () {
    return view('admin.dashboard');
})->middleware(['auth'])->name('dashboard');

// 
Route::middleware(['auth'])->group(function () {

    
    Route::middleware(['webmaster'])->group(function () {
        Route::get('/admin/user/all', [UserController::class, 'index'])->name('user.all'); 
        Route::get('/admin/user/add', [UserController::class, 'create'])->name('user.create'); 
        Route::post('/admin/user/store', [UserController::class, 'store'])->name('user.store'); 
        Route::get('/admin/usertoact', [UserController::class, 'actlist'])->name('user.act'); 
        Route::get('/admin/actuser/{user}/{proced}', [UserController::class, 'actuser'])->name('user.activate'); 
    });
        
        Route::get('/admin/user/edit/{user}', [UserController::class, 'edit'])->name('user.edit')->middleware(['adminoruser']); 
        Route::post('/admin/user/update/{user}', [UserController::class, 'update'])->name('user.update')->middleware(['adminoruser']); 
        
        Route::get('/admin/user/{user}', [UserController::class, 'show'])->name('user.show');

});






require __DIR__.'/auth.php';
