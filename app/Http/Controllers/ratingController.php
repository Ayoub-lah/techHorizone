<?php
namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Support\Facades\Auth;
use App\Models\Note;
use App\Models\User;
use Illuminate\Http\Request;

class ratingController extends Controller
{public function rating_post(Request $request)
{
    try {
        $note = new Note();
        $note->rating = $request->rating;
        $note->article_id = $request->article_id; // Changé de id_article à article_id
        $note->user_id = Auth::user()->id;

        if($note->save()) {
            return redirect()->back()->with('success', 'Note ajoutée avec succès');
        }
    } catch (\Exception $e) {
        dd($e->getMessage()); // Pour voir l'erreur en développement
        return redirect()->back()->with('error', 'Erreur lors de l\'ajout de la note');
    }
}
}