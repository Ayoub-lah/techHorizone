<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Theme; // Assure-toi que le modèle Theme existe

class AbonnementController extends Controller
{
    public function index()
    {
        // Récupère tous les thèmes disponibles
        $themes = Theme::all();

        // Récupère les thèmes auxquels l'utilisateur est déjà abonné
        $userThemes = auth()->user()->themes; 

        return view('abonne.abonnement', compact('themes', 'userThemes'));
    }

    public function toggle($id)
    {
        $user = auth()->user(); // Récupère l'utilisateur connecté
        $theme = Theme::findOrFail($id); 

        if ($user->themes->contains($theme)) {
            // Si l'utilisateur est déjà abonné, on le désabonne
            $user->themes()->detach($theme);
            session()->flash('success', 'Vous êtes désabonné du thème ' . $theme->name);
        } else {
            // Sinon, on l'abonne au thème
            $user->themes()->attach($theme);
            session()->flash('success', 'Vous êtes abonné au thème ' . $theme->name);
        }

        return redirect()->route('abonnement.index');
    }
}
