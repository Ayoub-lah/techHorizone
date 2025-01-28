<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use App\Models\Article;
use App\Models\Theme;
use App\Models\Visit;
use App\Models\Subscription;
use App\Models\Magazine;


use Illuminate\Http\Request;
use App\Models\Post;
use Termwind\Components\Dd;

class propositionController extends Controller
{
 public function user_post(Request $request)
 {
    $request->validate([
        'theme' => 'required|exists:themes,id', // Vérifie que l'ID du thème existe
        'title' => 'required',
        'description' => 'required',
        'image' => 'required'
    ]);

    $posts=new Article();
     $posts->title= $request->title;
     $posts->content= $request->description;
     
        $posts->user_id=Auth::user()->id;
        $posts->image=$request->image;
        $posts->state='en attente';
        $posts->theme_id = $request->theme; // Utilise directement l'ID du thème sélectionné

        $posts->save();
        return redirect()->route('proposition.create')->with('success', 'Votre proposition a été envoyée avec succès.');
 


 }

//-- Étape 1 : Vérifier si l'utilisateur est connecté
// -- (Cela est généralement géré par le middleware ou une autre couche, donc pas directement en SQL.)

// -- Étape 2 : Récupérer l'ID des thèmes auxquels l'utilisateur est abonné
// SELECT theme_id
// FROM subscriptions
// WHERE user_id = :userId;

// -- Étape 3 : Si l'utilisateur n'est abonné à aucun thème, retourne une vue vide
// -- (Ceci est une logique côté application, pas en SQL.)

// -- Étape 4 : Récupérer les articles liés à ces thèmes et ayant l'état "actif"
// SELECT *
// FROM articles
// WHERE theme_id IN (
//     SELECT theme_id
//     FROM subscriptions
//     WHERE user_id = :userId
// )
// AND state = 'actif';

public function affichage()
{
    // Vérifiez si l'utilisateur est connecté
    if (!Auth::check()) {
        return redirect()->route('login')->with('error', 'Vous devez être connecté pour accéder à cette page.');
    }

    // Récupérer l'ID de l'utilisateur connecté
    $userId = Auth::user()->id;
   
    // Récupérer les thèmes auxquels l'utilisateur est abonné
    $subscribedThemeIds = Subscription::where('user_id', $userId)
        ->pluck('theme_id')
        ->toArray();

    // Si l'utilisateur n'est abonné à aucun thème, retournez une vue vide
    if (empty($subscribedThemeIds)) {
        return view('abonne.abonne', [
            'posts' => [],
            'magazines' => Magazine::all(), // Récupérer tous les magazines
            'recomm' => Article::where('state', 'actif')->get(),    // Récupérer tous les articles pour les recommandations
            'user' => $userId
        ]);
    }

    // Récupérer les articles liés à ces thèmes et ayant l'état "actif"
    $posts = Article::whereIn('theme_id', $subscribedThemeIds)
        ->where('state', 'actif')
        ->get();

    // Récupérer tous les magazines (sans filtrage)
    $magazines = Magazine::all();

    // Récupérer toutes les recommandations (sans filtrage)
    $recomm = Article::whereNotIn('theme_id', $subscribedThemeIds)
        ->where('state', 'actif')
        ->get();

    // Passer les articles, magazines et recommandations à la vue
    return view('abonne.abonne', compact('posts', 'magazines', 'recomm', 'userId'));
}


 public function article_details($id)
 {
     $article = Article::findOrFail($id); // Utilisez findOrFail pour gérer les erreurs si l'article n'existe pas.
     $comments = $article->comments()->orderBy('created_at', 'desc')->get(); // Chargez les commentaires associés
     return view('abonne.article_details', compact('article', 'comments'));
 }
 public function afficher_historique()
 {
    $userId = Auth::user()->id;
    $visits = Visit::where('user_id', $userId) // Filtre par l'utilisateur connecté
    ->with(['article', 'user']) // Charge les relations
    ->orderBy('created_at', 'desc') // Trie par date de création décroissante
    ->paginate(10);
    
     return view('abonne.historique', compact('visits'));
 }

 public function affichageAdmin()
 {
  $post= Article::all();
  
     return view('admin.admin',compact('post'));
 }

 public function track_and_show_article($id)
    {
        $article = Article::findOrFail($id); // Vérifie si l'article existe
        $comments = $article->comments()->orderBy('created_at', 'desc')->get(); // Récupère les commentaires
    
        // Enregistrement de la visite dans la table visits
        if (Auth::check()) {
            Visit::create([
                'user_id' => Auth::user()->id,
                'article_id' => $id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    
        // Retourne la vue avec les données nécessaires
        return view('abonne.article_details', compact('article', 'comments'));
    }
    

    public function afficherThemes()
    {
        // Récupérer tous les thèmes depuis la base de données
        $welcome = Theme::all();
        $maga = Magazine::limit(3)->get(); 
        ;
        
        // Passer les thèmes à la vue
        return view('welcome', compact('welcome','maga'));
    }
    public function affichageThemes()
    {
        $themes = Theme::all();
        return view('abonne.proposition', compact('themes'));
    }
} 