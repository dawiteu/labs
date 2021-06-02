<?php

use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\TestimontialController;
use App\Http\Controllers\UserController;
use App\Models\Newsletter;
use App\Models\Testimontial;
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
        // gestion user --> sera que pour le 'grand' admin (surtout l'ajout, l'accept c'est okpour le wemB);
        Route::get('/admin/user/all', [UserController::class, 'index'])->name('user.all'); 
        Route::get('/admin/user/add', [UserController::class, 'create'])->name('user.create'); 
        Route::post('/admin/user/store', [UserController::class, 'store'])->name('user.store'); 
        Route::get('/admin/usertoact', [UserController::class, 'actlist'])->name('user.act'); 
        Route::get('/admin/actuser/{user}/{proced}', [UserController::class, 'actuser'])->name('user.activate'); 
                
        // gestion newsletter 
        Route::get('/admin/newsletter/all', [NewsletterController::class, 'index'])->name('newsletter.all');

        //gestion services: 
        Route::get('/admin/services/all', [ServicesController::class,'index'])->name('services.all'); 
        Route::get('/admin/services/edit/{service}', [ServicesController::class,'edit'])->name('service.edit'); 
        Route::put('/admin/services/update/{service}', [ServicesController::class, 'update'])->name('service.update'); 
        Route::post('/admin/services/del/{service}', [ServicesController::class, 'destroy'])->name('service.del');
        Route::post('/admin/services/store', [ServicesController::class, 'store'])->name('service.store'); 

        Route::get('/admin/services/icones', [ServicesController::class,'searchicones'])->name('services.icones');
        Route::get('/admin/services/create', [ServicesController::class,'create'])->name('service.create');  

        //testimontials: 

        Route::get('/admin/testimontials/all', [TestimontialController::class,'index'])->name('testimontial.all');

    });
        
        Route::get('/admin/user/edit/{user}', [UserController::class, 'edit'])->name('user.edit')->middleware(['adminoruser']); 
        Route::post('/admin/user/update/{user}', [UserController::class, 'update'])->name('user.update')->middleware(['adminoruser']); 
        
        Route::get('/admin/user/{user}', [UserController::class, 'show'])->name('user.show');

});






require __DIR__.'/auth.php';
