<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\FrontPageController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PosteController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\SubjectContactController;
use App\Http\Controllers\TagController;
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
                

        // gestion USER 2 (ROLES ET POSTES )
        Route::get('/admin/role', [RoleController::class,'index'])->name('role.index'); 
        Route::post('/admin/role/store', [RoleController::class,'store'])->name('role.store');
        Route::get('/admin/role/edit/{role}',[RoleController::class,'edit'])->name('role.edit');
        Route::post('/admin/role/update/{role}', [RoleController::class,'update'])->name('role.update');
        Route::get('/admin/role/destroy/{role}',[RoleController::class,'destroy'])->name('role.destroy'); 


        Route::get('/admin/postes', [PosteController::class,'index'])->name('postes.index'); 
        Route::get('/admin/postes/destroy/{poste}', [PosteController::class,'destroy'])->name('postes.destroy');
        Route::post('/admin/poste/store', [PosteController::class,'store'])->name('postes.store');
        Route::get('/admin/postes/edit/{poste}', [PosteController::class,'edit'])->name('postes.edit');
        Route::post('/admin/poste/update/{poste}', [PosteController::class,'update'])->name('postes.update');


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
        Route::get('/admin/testimontials/', [TestimontialController::class,'index'])->name('testimontial.all');
        Route::get('/admin/testimontials/create', [TestimontialController::class,'create'])->name('testimontial.create');
        Route::post('/admin/testimontials/store', [TestimontialController::class,'store'])->name('testimontial.store'); 
        Route::get('/admin/testimontials/edit/{testimontial}',[TestimontialController::class,'edit'])->name('testimontial.edit');
        Route::post('/admin/testimontials/update/{testimontial}', [TestimontialController::class,'update'])->name('testimontial.update');
        Route::get('/admin/testimontials/delete/{testimontial}', [TestimontialController::class,'destroy'])->name('testimontial.destroy');

        // Gestions des PAGES du front.  
        Route::get('/admin/frontpage/index', [FrontPageController::class, 'index'])->name('pages.index'); 
        Route::get('/admin/frontpage/edit/{page}', [FrontPageController::class, 'edit'])->name('pages.edit'); 
        Route::post('/admin/front/update/home', [FrontPageController::class, 'updateHome'])->name('pages.updatehome');
        Route::post('/admin/front/update/services', [FrontPageController::class, 'updateServices'])->name('pages.updateservices');
        Route::post('/admin/front/update/contact', [FrontPageController::class, 'updateContact'])->name('pages.updatecontact');

        Route::post('/admin/front/updatehomecar/{item}', [FrontPageController::class,'updateHomeCar'])->name('pages.updatehomecar');
        Route::post('/admin/front/storehomecar/', [FrontPageController::class,'storeHomeCar'])->name('pages.storehomecar');
        // sujets contact FROM mail 
        Route::get('/admin/sujets/', [SubjectContactController::class, 'index'])->name('subject.index'); 
        // Route::get('/admin/sujets/create', [SubjectContactController::class,'create'])->name('subject.create');
        Route::post('/admin/sujets/store', [SubjectContactController::class,'store'])->name('subject.store'); 
        Route::get('/admin/sujets/edit/{sujet}',[SubjectContactController::class,'edit'])->name('subject.edit');
        Route::post('/admin/sujets/update/{sujet}', [SubjectContactController::class,'update'])->name('subject.update');
        Route::get('/admin/sujets/delete/{sujet}', [SubjectContactController::class,'destroy'])->name('subject.destroy');


        // BLOG mais validation (que pour admin)  POSTES 
        Route::get('/admin/blog/v/a/{article}', [BlogController::class,'valideArticle'])->name('admin.blog.validepost');
        Route::get('/admin/blog/r/a/{article}', [BlogController::class,'refuseArticle'])->name('admin.blog.refusepost');
        
        // BLOG mais validation (que pour admin)  COMMENATAIRES 
        Route::get('/admin/blog/v/c/{comment}', [BlogController::class,'valideCom'])->name('admin.blog.validecom');
        Route::get('/admin/blog/r/c/{comment}', [BlogController::class,'refuseCom'])->name('admin.blog.refusecom');

        // BLOG CATEGORIE (CRUD)
        Route::get('/admin/categorie', [CategorieController::class,'index'])->name('categorie.index'); 
        Route::post('/admin/categorie/store', [CategorieController::class,'store'])->name('categorie.store'); 
        Route::get('/admin/categorie/edit/{categorie}',[CategorieController::class,'edit'])->name('categorie.edit');
        Route::post('/admin/categorie/update/{categorie}', [CategorieController::class,'update'])->name('categorie.update');
        Route::get('/admin/categorie/delete/{categorie}', [CategorieController::class,'destroy'])->name('categorie.destroy');
        
        // BLOG TAGS (CRUD)
        Route::get('/admin/tag', [TagController::class,'index'])->name('tag.index'); 
        Route::post('/admin/tag/store', [TagController::class,'store'])->name('tag.store'); 
        Route::get('/admin/tag/edit/{tag}',[TagController::class,'edit'])->name('tag.edit');
        Route::post('/admin/tag/update/{tag}', [TagController::class,'update'])->name('tag.update');
        Route::get('/admin/tag/delete/{tag}', [TagController::class,'destroy'])->name('tag.destroy');

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
