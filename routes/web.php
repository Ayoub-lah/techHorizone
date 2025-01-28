<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ResponsableController;
use App\Http\Controllers\ThemeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\MagazineController;
use App\Http\Controllers\commentsController;
use App\Http\Controllers\propositionController;
use App\Http\Controllers\articlesController;
use App\Http\Controllers\ratingController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\MagazinesAController;
use App\Models\Magazine;
use App\Models\Theme;

// Welcome Page
Route::get('/', function () {
    return view('welcome');
});

// Tableau de bord client
Route::get('/dashboard', [propositionController::class, 'affichage'])
    ->middleware(['auth', 'verified', 'rolemanager:customer'])
    ->name('dashboard');
    Route::patch('/admin/articles/{id}/update-magazine', [ArticleController::class, 'updateMagazine'])->name('admin.articles.updateMagazine');



// Admin Dashboard (Protected by RoleManager Middleware)
Route::middleware(['auth', 'verified', 'rolemanager:admin'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin/layout/master');
    })->name('admin');
});

Route::get('dash', function () {
    return view('admin/layout/dash');
})->name('admin.dash');

Route::get('/users', function () {
    return view('admin/layout/users');
})->name('admin.users');

Route::get('/articles', function () {
    return view('admin/layout/articles');
})->name('admin.articles');

Route::get('/magazines', function () {
    return view('admin/layout/magazines');
})->name('admin.magazines');

Route::get('dash', [DashboardController::class, 'index'])->name('admin.dash');

Route::delete('/admin/users/{id}', [UserController::class, 'destroy'])->name('admin.users.destroy');

Route::patch('/admin/users/{id}/block', [UserController::class, 'block'])->name('admin.users.block');

Route::patch('/admin/users/{id}/update-role', [UserController::class, 'updateRole'])->name('admin.users.updateRole');

Route::patch('/admin/articles/{id}/activate', [ArticleController::class, 'activate'])->name('admin.articles.activate');
Route::patch('/admin/articles/{id}/deactivate', [ArticleController::class, 'deactivate'])->name('admin.articles.deactivate');

Route::get('/admin/magazines', [MagazineController::class, 'index'])->name('admin.magazines');

Route::patch('/admin/magazines/{id}/activate', [MagazineController::class, 'activate'])->name('admin.magazines.activate');
Route::patch('/admin/magazines/{id}/deactivate', [MagazineController::class, 'deactivate'])->name('admin.magazines.deactivate');

Route::get('/admin', [MagazineController::class, 'create'])->name('admin.create');

Route::post('/admin/magazines', [MagazineController::class, 'store'])->name('admin.magazines.store');

// Authenticated Routes (Profile and Theme Management)
Route::middleware('auth')->group(function () {
    // Profile Routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Theme Management Route
    Route::post('/save-themes', [ThemeController::class, 'store'])->name('save.themes');
});

// Responsable Routes (Protected by RoleManager Middleware)
Route::middleware(['auth', 'verified', 'rolemanager:responsable'])->prefix('responsable')->name('responsable.')->group(function () {
    Route::get('/dashboard', [ResponsableController::class, 'dashboard'])->name('dashboard');
    Route::get('/abonnes', [ResponsableController::class, 'subscriptions'])->name('subscriptions');
    Route::delete('/abonne', [ResponsableController::class, 'delete_subscription'])->name('delete_subscription');
    Route::get('/articles', [ResponsableController::class, 'articles'])->name('articles');
    Route::get('/moderation', [ResponsableController::class, 'moderation'])->name('moderation');
    Route::put('/articles/{id}/publish', [ResponsableController::class, 'publish'])->name('articles.publish');
    Route::put('/articles/{id}/reject', [ResponsableController::class, 'reject'])->name('articles.reject');
    Route::get('/post_details/{id}', [ResponsableController::class, 'post_details'])->name('post_details');
    Route::get('/lireplus/{id}', [ResponsableController::class, 'lireplus'])->name('lireplus');


    // Commentaires

});
Route::post('/post_details/{id}/recomand', [ResponsableController::class, 'recomand'])->name('responsable.post_details.recomand');
Route::post('/comments_post', [ResponsableController::class, 'comment_post'])
->middleware(['auth', 'verified'])
->name('comment_post');
Route::delete('/comments/{id}', [ResponsableController::class, 'delete_comment'])->name('delete_comment');



//abonne routes
Route::get('/article', [articlesController::class, 'affichage']);
// Theme Management Route
Route::post('/save-themes', [ThemeController::class, 'store'])->name('save.themes');

// Propositions d'articles
Route::get('/proposition', function () {
   $themes = Theme::all(); 
    return view('abonne.proposition',compact('themes'));
})->name('proposition.create');
Route::post('/user_post', [propositionController::class, 'user_post']);

// Articles
Route::get('/article_details/{id}', [propositionController::class, 'article_details'])
    ->middleware(['auth', 'verified'])
    ->name('article.details');

// Notation des articles
Route::post('/rating_post', [ratingController::class, 'rating_post'])
    ->middleware(['auth', 'verified'])
    ->name('rating.post');

// Commentaires
Route::post('/comment_post', [commentsController::class, 'comment_post'])
    ->middleware(['auth', 'verified'])
    ->name('comment.post');

     // Categorie Page
Route::get('/categorie', function () {
    return view('abonne.categorie'); // Replace with your view name
})->name('categorie')->middleware('auth');

// Historique de navigation
Route::get('/historique', [propositionController::class, 'afficher_historique'])
    ->middleware(['auth', 'verified'])
    ->name('historique');
    // Articles
Route::get('/article_details/{id}', [propositionController::class, 'track_and_show_article'])
->middleware(['auth', 'verified'])
->name('article_details');
    //abonnement
    Route::get("/abonnement",function(){
        return view('abonne.abonnement');

    });

   

    Route::post('/toggle-subscription/{themeId}', [ThemeController::class, 'toggleSubscription'])->name('toggle-subscription');
Route::get('/abonnement', [ThemeController::class, 'index'])->name('abonnement');

// Déconnexion
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->name('logout');
    Route::get('/magazine',function(){
        return view('abonne.magazines');
    });
//magazines
Route::get('/magazine',[MagazinesAController::class,'affichermagazine']);
Route::get('/magazines_details/{id}', [MagazinesAController::class, 'magazines_details'])
    ->middleware(['auth', 'verified'])
    ->name('magazines_details.details');


    Route::POST('/reply/{commentId}', [CommentsController::class, 'reply_post'])->name('reply.post');
//acceuil
Route::get('/',[propositionController::class,'afficherThemes']);
require __DIR__ . '/auth.php';
