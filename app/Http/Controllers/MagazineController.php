<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Magazine; // Importez le modèle Magazine

class MagazineController extends Controller
{
    /**
     * Affiche la liste des magazines.
     */
    public function index()
    {
        $magazines = Magazine::all(); // Récupère tous les magazines
        return view('admin.layout.magazines', compact('magazines'));
    }

    /**
     * Active un magazine.
     */
    public function activate($id)
    {
        $magazine = Magazine::findOrFail($id);
        $magazine->is_public = true; // Met à jour le statut à "public"
        $magazine->save();

        return redirect()->route('admin.magazines')->with('success', 'Magazine activé avec succès');
    }

    /**
     * Désactive un magazine.
     */
    public function deactivate($id)
    {
        $magazine = Magazine::findOrFail($id);
        $magazine->is_public = false; // Met à jour le statut à "non public"
        $magazine->save();

        return redirect()->route('admin.magazines')->with('success', 'Magazine désactivé avec succès');
    }

    public function create()
{
    return view('admin.layout.create'); // Affiche le formulaire d'ajout
}

public function store(Request $request)
{
    // Validation des données
    $request->validate([
        'number' => 'required|integer|unique:magazines,number',
        'is_public' => 'required|boolean',
    ]);

    // Création du magazine
    Magazine::create([
        'number' => $request->input('number'),
        'is_public' => $request->input('is_public'),
    ]);

    return redirect()->route('admin.magazines')->with('success', 'Magazine ajouté avec succès');
}

}
