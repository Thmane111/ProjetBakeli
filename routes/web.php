<?php

use App\Enums\Providers;
use App\Http\Controllers\AcceuilController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AnnonceController;
use App\Http\Controllers\AnnonceurController;
use App\Http\Controllers\CatFiltreController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\PanelAdmin;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PanelMembre;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\GroupeController;
use App\Http\Controllers\AccesController;
use App\Http\Controllers\Backlg;
use App\Http\Controllers\CatController;
use App\Http\Controllers\Sous_CatController;
use App\Http\Controllers\AttributionController;
use App\Http\Controllers\ProdController;
use App\Http\Controllers\DropController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CheminController;
use App\Http\Controllers\SocialiteAuthController;
use App\Models\ImageProduct;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\AdminControlle;
use App\Http\Controllers\SignalController;
use App\Http\Controllers\MembreController;
use App\Http\Controllers\NavBarController;
use App\Http\Controllers\UserController;
use App\Models\Product;

use App\Http\Controllers\PermissionController;
use App\Http\Controllers\TacheController;
use App\Http\Controllers\NavigationController;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\VendeurController;
use App\Http\Controllers\TypeAnnonceurController;
use App\Http\Controllers\MenuNavigueController;
use App\Http\Controllers\PlanAbonnementController;



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
$globe=0;

Route::get('/shop', function () {
    




    return view('Front.shop');
})->name('app.shop');
Route::get('/shop/detail/1', function () {
    




    return view('Front.detail');
})->name('app.shop');
Route::get('/checkout', function () {
    return view('Front.checkout');
})->name('app.shop');

Route::get('/contact', function () {
    return view('Front.contact');
})->name('app.shop');
Route::get('/blog', function () {
    return view('Front.blog');
})->name('app.shop');
Route::get('/', function () {
    $date_recente = date('Y-m-d', strtotime('-7 days')); // date récente : il y a 7 jours


    $oo=Product::all()
    ->where('created_at', '>=', $date_recente)
    ->where('etat','=',1)
    ;



 $globe=Product::all()->where('etat','=',1)

 ->where('deletable','=','0')
 ->where('created_at', '<=', $date_recente);

 foreach($oo as $oos){
 $img=ImageProduct::all()->where('product_id','=',$oos->id)->first();


 }

    return view('Front.partials.main',compact('globe','oo'));
})->name('app.dashboard');

Route::get('/categorie/bags/{id}',[NavBarController::class, 'nav1'])->name('filtre.nav1');
Route::get('/categorie/bags2/{id1}/{id2}',[NavBarController::class, 'nav2'])->name('filtre.nav2');

Route::resource('/app/securite/',SignalController::class);

Route::post('/securite/{id}',[SignalController::class, 'update'])->name('signalez.update');
Route::post('/securite',[SignalController::class, 'store'])->name('signalez.store');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::patch('/profile-update/{id}', [ProfileController::class, 'update_profile'])->name('profile.update_profile');
});


Route::middleware(['auth','verified'])->group(function(){





    Route::post('/app/activation-produit/{id}', [ProdController::class, 'state'])->name('Product.state');
    Route::post('/app/destroy-produit/{id}', [ProdController::class, 'destroy_df'])->name('Product.destroy_df');









    });

    Route::get('/recherche', [ProdController::class, 'search'])->name('Product.search');
    Route::middleware(['auth','verified'])->group(function(){
        Route::get('/chemin/{id}',[CheminController::class, 'index'])->name('Backlg.index');

    });


    //Route::get('dropdown', [DropController::class, 'view'])->name('dropdownView');
    //Route::get('get-states', [DropController::class, 'getStates'])->name('getStates');
    //Route::get('get-cities', [DropController::class, 'getCities'])->name('getCities');



   










Route::get('/app/activation-produit/{id}',[ProdController::class, 'state'])->name('Produit.state');
Route::get('/app/Detail/{id}', [PanelMembre::class, 'detail'])->name('Panel.detail');



Route::get('login/google',[GoogleController::class, 'redirectToGoogle'])->name('login.google');
Route::get('login/google/callback',[GoogleController::class, 'redirectToGoogleCallback']);


Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');


Route::get('send-mail',[MailController::class,'index']);






Route::get('/notify',[AdminControlle::class, 'notify'])->name('admin.notify');








// ESPACE ANNONCEUR

Route::middleware('auth')->group(function () {
    Route::resource('/expad/dash-annonceur',AnnonceurController::class);
    Route::get('/expad/annonceur',[AnnonceurController::class, 'index'])->name('app.index');
    Route::post('/expad/annonceur/{id}',[AnnonceurController::class, 'update_profile'])->name('app.update_profile');
    Route::post('/expad/annonceur',[AnnonceurController::class, 'storeA'])->name('app.storeA');
    Route::get('/expad/annonceur/show/{id}',[AnnonceurController::class, 'show'])->name('app.show');
    Route::get('/expad/annonceur/active/{id}',[AnnonceurController::class, 'state'])->name('app.state');
    Route::put('/profile/update/{id}',[AnnonceurController::class, 'update'])->name('app.update');
    Route::get('/expad/formulaire',[AnnonceurController::class, 'form_annonce'])->name('app.form_annonce');
    Route::post('/expad/suppression{id}',[AnnonceurController::class, 'veuille'])->name('app.veuille');
    Route::get('/expad/vihicules',[AnnonceurController::class, 'vih_annonce'])->name('app.vihicules');
    Route::get('/expad/prenium',[AnnonceurController::class, 'prenium'])->name('app.prenium');
    Route::get('/expad/immobilisation',[AnnonceurController::class, 'immo_annonce'])->name('app.immobiliers');
    Route::put('/produit/modification/{id}',[AnnonceurController::class, 'update_prod'])->name('app.update_prod');
    Route::get('/expad/getPrenium/{id}', [AnnonceurController::class, 'getPrenium'])->name('app.getPrenium');
    Route::post('/profile/store/{id}',[AnnonceurController::class, 'update_profile'])->name('app.update_profile');
    Route::get('/form_annonce',[AnnonceurController::class, 'form_annonce'])->name('app.form_annonce');
    Route::get('/immo_annonce',[AnnonceurController::class, 'immo_annonce'])->name('app.immobiliers');
    Route::get('/modification/{id}',[AnnonceurController::class, 'edit_prod'])->name('app.edit_prod');
    Route::get('/getCountry/{id}', [AnnonceurController::class, 'getCountry'])->name('app.getCountry');
});


// ESPACE VISITEUR
Route::get('/annonce/detail/{id}',[AcceuilController::class, 'show'])->name('Panel.show');
Route::get('/categorie/{id}',[CatFiltreController::class, 'show_cat'])->name('Panel.show_cat');
Route::get('/electronique/{id}',[CatFiltreController::class, 'show_electro'])->name('Panel.show_electro');
Route::get('/immobiliere/{id}',[CatFiltreController::class, 'show_imm'])->name('Panel.show_imm');

//ESPACE ADMIN
Route::get('/bagwelle', function () {
    return view('Back.partials.main');
})->middleware('auth:admin','verified')->name('admin.dashboard');

Route::get('/email/verify', [VerificationController::class, 'show'])->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', [VerificationController::class, 'verify'])->name('verification.verify');
Route::post('/email/resend', [VerificationController::class, 'resend'])->name('verification.resend');





Route::get('/api/bagwelle/produit', [AnnonceController::class, 'ajout'])->name('APIAJOUT.ajout');
Route::get('/api/bagwelle/produit/detail/{id}', [AnnonceController::class, 'detail'])->name('APIAJOUT.detail');
Route::get('/api/bagwelle/produit/detail/Image/{id}', [AnnonceController::class, 'detailImage'])->name('APIAJOUT.detailImage');
Route::get('/api/bagwelle/categorie', [AnnonceController::class, 'categorie'])->name('APIAJOUT.categorie');
Route::get('/api/bagwelle/filtre/{id}', [AnnonceController::class, 'filtre'])->name('APIAJOUT.filtre');
Route::get('/api/annonces/liste/{id}', [AnnonceController::class, 'liste'])->name('APIAJOUT.liste');
Route::get('/api/getCountry1/{id}', [AnnonceurController::class, 'getCountry1'])->name('APIAJOUT.getCountry1');
Route::post('/api/bagwelle/produit/ajoute', [AnnonceurController::class, 'ajoutAPI'])->name('APIAJOUT.ajoutAPI');



Route::middleware('admin')->group(function () {
    Route::get('/bagwelle/annonceurs', [AnnoncerController::class, 'index'])->name('annonceur.index');
    Route::get('/bagwelle/annonceurs/edit/{id}', [AnnoncerController::class, 'edit'])->name('annonceur.edit');
    Route::post('/bagwelle/annonceurs', [AnnoncerController::class, 'store'])->name('annonceur.store');
    Route::get('/bagwelle/annonceurs/create', [AnnoncerController::class, 'create'])->name('annonceur.create');
    Route::put('/bagwelle/annonceur/{id}', [AnnoncerController::class, 'update'])->name('annonceur.update');
    Route::delete('/bagwelle/annonceur/{id}', [AnnoncerController::class, 'destroy'])->name('annonceur.destroy');
    Route::patch('/bagwelle/annonceur-update/{id}', [AnnoncerController::class, 'update_annonceur'])->name('annonceur.update_profile');
    Route::post('/bagwelle/annonceurs/etat/{id}', [AnnoncerController::class, 'state'])->name('annonceur.state');
});


Route::middleware('admin')->group(function () {
    Route::get('/bagwelle/annonce', [AnnonceController::class, 'index'])->name('annonce.index');
    Route::get('/bagwelle/annonce/edit/{id}', [AnnonceController::class, 'edit'])->name('annonce.edit');
    Route::get('/bagwelle/annonce/show/{id}', [AnnonceController::class, 'show'])->name('annonce.show');
    Route::post('/bagwelle/annonce', [AnnonceController::class, 'store'])->name('annonce.store');
    Route::get('/bagwelle/annonce/create', [AnnonceController::class, 'create'])->name('annonce.create');
    Route::put('/bagwelle/annonce/{id}', [AnnonceController::class, 'update'])->name('annonce.update');
    Route::delete('/bagwelle/annonce/{id}', [AnnonceController::class, 'destroy'])->name('annonce.destroy');
    Route::patch('/bagwelle/annonce-update/{id}', [AnnonceController::class, 'update_annonce'])->name('annonce.update_profile');
    Route::post('/bagwelle/annonce/etat/{id}', [AnnonceController::class, 'state'])->name('annonce.state');
    Route::get('/bagwelle/ListAnnonce', [MembreController::class, 'index'])->name('Backlg.index');
    Route::get('/bagwelle/AjoutAnnonce', [MembreController::class, 'create'])->name('Backlg.create');
    Route::post('/bagwelle/AjoutAnnonce', [MembreController::class, 'store'])->name('Backlg.store');
    Route::get('/bagwelle/membre/activation/{id}', [MembreController::class, 'state'])->name('Backlg.state');
    Route::get('/bagwelle/membre/{id}', [MembreController::class, 'edit'])->name('Backlg.Modifier');
    Route::put('/bagwelle/membre/edit/{id}', [MembreController::class, 'update'])->name('Backlg.update');
    Route::get('/bagwelle/membre/show/{id}', [MembreController::class, 'show'])->name('Backlg.Voir');
    Route::put('/bagwelle/membre/supprimer', [MembreController::class, 'destroy'])->name('Backlg.Supprimer');

});


Route::middleware('admin')->group(function () {
    Route::post('/bagwelle/sous_categorie/create', [sous_CatController::class, 'store'])->name('sous_categorie.store');
    Route::put('/sous_categorie/{id}', [sous_CatController::class, 'update'])->name('sous_categorie.update');
    Route::delete('/sous_categorie/{id}', [sous_CatController::class, 'destroy'])->name('sous_categorie.destroy');
    Route::post('/bagwelle/sous_categorie/etat/{id}', [sous_CatController::class, 'state'])->name('sous_categorie.state');

});

Route::middleware('admin')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/bagwelle/profile/{id}', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::patch('/profile-update/{id}', [ProfileController::class, 'update_profile'])->name('profile.update_profile');
});



Route::resource('/bagwelle/Module',ModuleController::class)->middleware('admin');
Route::resource('/bagwelle/groupe',GroupeController::class)->middleware('admin');
Route::resource('/bagwelle/acces',AccesController::class)->middleware('admin');
Route::resource('/bagwelle/utilisateurs',UserController::class)->middleware('admin');
Route::resource('/bagwelle/categorie',CatController::class)->middleware('admin');
Route::post('/bagwelle/categorie-state/{id}',[CatController::class, 'state'])->name('categorie.state')->middleware('admin');
Route::resource('/bagwelle/sous_categories',Sous_CatController::class)->middleware('admin');
Route::resource('/bagwelle/menu',MenuController::class)->middleware('admin');
Route::resource('/bagwelle/propos',ProposController::class)->middleware('admin');

Route::resource('/bagwelle/tache',TacheController::class)->middleware('admin');
Route::post('blog/store',[BlogController::class,'store'])->name('Blog.store');
Route::resource('/bagwelle/Attribution',AttributionController::class)->middleware('admin');
Route::resource('/bagwelle/permission',PermissionController::class)->middleware('admin');
Route::get('/bagwelle/utilisateurs/{id}',[UserController::class,'state'])->name('utilisateurs.state')->middleware('admin');
Route::post('/logout',[AdminController::class,'store'])->name('admin.store');
Route::post('/logout',[AdminController::class, 'UserLogout'])->name('app.logout');

Route::resource('/bagwelle/slide',SlideController::class)->middleware('admin');
Route::resource('/bagwelle/partenaire',PartenaireController::class)->middleware('admin');
Route::resource('/bagwelle/service',ServiceController::class)->middleware('admin');
Route::resource('/bagwelle/page',PageController::class)->middleware('admin');
Route::resource('/bagwelle/navigation',NavigationController::class)->middleware('admin');
Route::post('/bagwelle/activation-module/{id}',[ModuleController::class, 'state'])->name('Module.state')->middleware('admin');
Route::post('/bagwelle/activation-navigation/{id}',[NavigationController::class, 'state'])->name('navigation.state')->middleware('admin');
Route::post('/bagwelle/activation-groupe/{id}',[GroupeController::class, 'state'])->name('groupe.state')->middleware('admin');
Route::post('/bagwelle/activation-attribution/{id}',[AttributionController::class, 'state'])->name('Attribution.state')->middleware('admin');
Route::post('/bagwelle/activation-acces/{id}',[AccesController::class, 'state'])->name('acces.state')->middleware('admin');
Route::post('/bagwelle/activation-menu/{id}',[MenuController::class, 'state'])->name('menu.state')->middleware('admin');
Route::post('/bagwelle/activation-tache/{id}',[TacheController::class, 'state'])->name('tache.state')->middleware('admin');
Route::get('/bagwelle/permission-active/{id}/{id2}',[PermissionController::class, 'permi2'])->name('permission.permi2')->middleware('admin');
Route::get('/bagwelle/liste_Membre/{id}',[UserController::class, 'Liste_Membre'])->name('utilisateurs.Liste_Membre')->middleware('admin');
Route::get('/bagwelle/formulaire-user/{id}',[UserController::class, 'create2'])->name('utilisateurs.create2')->middleware('admin');
Route::post('/bagwelle/register-utilisateurs',[UserController::class, 'registerDash'])->name('utilisateurs.registerDash')->middleware('admin');










Route::middleware('admin')->group(function () {
    Route::get('/bagwelle/type_vende', [TypeAnnonceurController::class, 'index'])->name('type_vende.index');
    Route::post('/bagwelle/type_vende', [TypeAnnonceurController::class, 'store'])->name('type_vende.store');
    Route::put('/bagwelle/type_vende/{id}', [TypeAnnonceurController::class, 'update'])->name('type_vende.update');
    Route::delete('bagwelle/type_vende/{id}', [TypeAnnonceurController::class, 'destroy'])->name('type_vende.destroy');
    Route::post('/bagwelle/type_vende/etat/{id}', [TypeAnnonceurController::class, 'state'])->name('type_vende.state');

});
Route::middleware('admin')->group(function () {
    Route::get('/bagwelle/nav', [MenuNavigueController::class, 'index'])->name('nav.index');
    Route::post('/bagwelle/nav', [MenuNavigueController::class, 'store'])->name('nav.store');
    Route::put('/bagwelle/nav/{id}', [MenuNavigueController::class, 'update'])->name('nav.update');
    Route::delete('bagwelle/nav/{id}', [MenuNavigueController::class, 'destroy'])->name('nav.destroy');
    Route::post('/bagwelle/nav/etat/{id}', [MenuNavigueController::class, 'state'])->name('nav.state');

});

Route::middleware('admin')->group(function () {
    Route::get('/bagwelle/plan', [PlanAbonnementController::class, 'index'])->name('plan.index');
    Route::post('/bagwelle/plan', [PlanAbonnementController::class, 'store'])->name('plan.store');
    Route::put('/bagwelle/plan/{id}', [PlanAbonnementController::class, 'update'])->name('plan.update');
    Route::delete('bagwelle/plan/{id}', [PlanAbonnementController::class, 'destroy'])->name('plan.destroy');
    Route::post('/bagwelle/plan/etat/{id}', [PlanAbonnementController::class, 'state'])->name('plan.state');

});

Route::middleware('admin')->group(function () {
    Route::get('/bagwelle/produit', [ProdController::class, 'index'])->name('produit.index');
    Route::get('/bagwelle/getProduit/{id}', [ProdController::class, 'getProduit'])->name('produit.getProduit');
    Route::get('/bagwelle/AjoutProduit', [ProdController::class, 'create'])->name('produit.create');
    Route::get('/bagwelle/ListProduit/show/{id}', [ProdController::class, 'show'])->name('ListProduit.show');
    Route::post('/bagwelle/produit', [ProdController::class, 'store'])->name('produit.store');
    Route::put('/bagwelle/produit/update/{id}', [ProdController::class, 'update'])->name('produit.update');
    Route::delete('bagwelle/produit/{id}', [ProdController::class, 'destroy'])->name('produit.destroy');
    Route::get('/bagwelle/produit/etat/{id}', [ProdController::class, 'state'])->name('produit.state');
    Route::get('/bagwelle/UpdateTabe1/{id}', [ProdController::class, 'UpdateTabe1'])->name('produit.UpdateTabe1');
    Route::get('/bagwelle/UpdateTabe2/{id}', [ProdController::class, 'UpdateTabe2'])->name('produit.UpdateTabe2');
    Route::get('/bagwelle/produit/edit/{id}', [ProdController::class, 'edit'])->name('produit.edit');

});



Route::get('/login/google', [LoginController::class, 'redirectToGoogle']);
Route::get('/login/google/callback', [LoginController::class, 'handleGoogleCallback']);

Route::post('/api/login',[LoginController::class,'login1'])->name('api.login1');

Route::post('/api/registre',[LoginController::class,'register'])->name('api.register');
Route::post('/api/user/profile',[AnnonceController::class,'profile'])->name('api.profile');





require __DIR__.'/auth.php';
require __DIR__.'/authadmin.php';
