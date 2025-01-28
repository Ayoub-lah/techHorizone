<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Article;
use App\Models\Theme;
use App\Models\Magazine;
use App\Models\visit;
use Illuminate\Support\Facades\DB;


use App\Http\Controllers\articlesController;


class   MagazinesAController extends Controller{
   public function affichermagazine(){
    
     $magazines=Magazine::all();
     return view('abonne.magazines', compact('magazines'));
   }

   public function magazines_details($id)
   { $magazines = Magazine::findOrFail($id);

    // Récupérer les articles associés à ce magazine
    $posts = Article::where('magazine_id', $id)->with('visits')->get();
    $recomm=Article::all();
     // Récupérer le nombre d'articsles dans ce magazine
     $nombreArticles = $magazines->articles->count();
    // Récupérer tous les articles avec le nombre de visites
   
       return view('abonne.magazines_details', compact('magazines','posts','recomm','nombreArticles'));
   }



 }











?>