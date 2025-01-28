<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Visit;

class VisitController extends Controller
{
    public function historique()
    {
        $historique = Visit::with('article') // Charge les articles associés
            ->where('user_id', auth()->id()) // Filtrer par utilisateur
            ->orderBy('id', 'desc') // Trier par date
            ->get();

        return view('abonne.historique', compact('historique'));
    }
}
