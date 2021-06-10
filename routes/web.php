<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\FrontPageController;
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

// front 
Route::get('/home', function () {
    return view('welcome');
})->name('home');


Route::get('/', [FrontController::class, 'index'])->name('front.index'); 

Route::get('/services', [FrontController::class, 'services'])->name('services.index'); 

Route::get('/contact', [FrontController::class, 'contact'])->name('contact.index'); 
Route::post('/contact-send-mail', [FrontController::class,'submitcontact'])->name('contact.sendemail');

Route::get('/blog', [FrontController::class, 'blog'])->name('blog.index'); 
Route::get('/blog/post/{id}', [FrontController::class, 'showart'])->name('blog.showart'); 
Route::get('/blog/categorie/{categorie}', [FrontController::class, 'showcats'])->name('blog.showcat'); // recherche par categorie ;  
Route::get('/blog/tag/{tag}', [FrontController::class,'showtags'])->name('blog.showtag'); 
Route::post('/blog/addcom/{article}', [FrontController::class, 'leavecomment'])->name('blog.addcom'); 
Route::get('/blog/search/', [FrontController::class, 'search'])->name('blog.search'); 

Route::post('/newsletterstore', [FrontController::class,'newsletterstore'])->name('newsletterstore'); 
Route::get('/newsletter/unsub/{email}', [FrontController::class, 'newsunsub'])->name('newsunsub'); 



// back 
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
        Route::get('/admin/newsletter/send', [NewsletterController::class, 'sendmailForm'])->name('newsletter.sform'); 
        Route::post('/admin/newsletter/sendmail', [NewsletterController::class,'sendmailsub'])->name('newsletter.sendmailsub');

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

        // Gestions des PAGES du front.  
        Route::get('/admin/frontpage/index', [FrontPageController::class, 'index'])->name('pages.index'); 
        Route::get('/admin/frontpage/edit/{page}', [FrontPageController::class, 'edit'])->name('pages.edit'); 
        Route::post('/admin/front/update/home', [FrontPageController::class, 'updateHome'])->name('pages.updatehome');
        Route::post('/admin/front/update/services', [FrontPageController::class, 'updateServices'])->name('pages.updateservices');
        Route::post('/admin/front/update/contact', [FrontPageController::class, 'updateContact'])->name('pages.updatecontact');

        // BLOG mais validation (que pour admin)  POSTES 
        Route::get('/admin/blog/v/a/{article}', [BlogController::class,'valideArticle'])->name('admin.blog.validepost');
        Route::get('/admin/blog/r/a/{article}', [BlogController::class,'refuseArticle'])->name('admin.blog.refusepost');
        
        // BLOG mais validation (que pour admin)  COMMENATAIRES 
        Route::get('/admin/blog/v/c/{comment}', [BlogController::class,'valideCom'])->name('admin.blog.validecom');
        Route::get('/admin/blog/r/c/{comment}', [BlogController::class,'refuseCom'])->name('admin.blog.refusecom');

    
    });

    Route::middleware(['redacteur'])->group(function () {
        Route::get('/admin/blog/index', [BlogController::class, 'index'])->name('admin.blog.index');
        Route::get('/admin/blog/create', [BlogController::class, 'create'])->name('admin.blog.create');
        Route::post('/admin/blog/store', [BlogController::class, 'store'])->name('admin.blog.store');
        Route::get('/admin/blog/show/{article}', [BlogController::class, 'show'])->name('admin.blog.show'); 
        Route::get('/admin/blog/edit/{article}', [BlogController::class, 'edit'])->name('admin.blog.edit'); 
        Route::post('/admin/blog/update/{article}', [BlogController::class,'update'])->name('admin.blog.update');
        Route::post('/admin/blog/delete/{article}', [BlogController::class,'destroy'])->name('admin.blog.destroy');
        Route::get('/admin/blog/valide/{valide}', [BlogController::class,'valide'])->name('admin.blog.valide');
    }); 
    
        
    Route::get('/admin/user/edit/{user}', [UserController::class, 'edit'])->name('user.edit')->middleware(['adminoruser']); 
    Route::post('/admin/user/update/{user}', [UserController::class, 'update'])->name('user.update')->middleware(['adminoruser']); 
        
    Route::get('/admin/user/{user}', [UserController::class, 'show'])->name('user.show');

});






require __DIR__.'/auth.php';
