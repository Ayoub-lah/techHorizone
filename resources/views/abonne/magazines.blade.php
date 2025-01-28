@extends('layouts.sidebar')
@section('sidebar')
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/abonne/magazine.css') }}">

    <title>TechHorizons - Nos Magazines</title>
    <style>
       
    </style>
</head>
<body>
    <div class="magazines-page">
        <h1 class="page-title">Nos Magazines</h1>

        <div class="filters">
            <div class="filter-group theme-filter">
                <label for="theme-select">Thème:</label>
                <select id="theme-select">
                    <option value="">Tous les thèmes</option>
                    <option value="tech">Technologie</option>
                    <option value="science">Science</option>
                    <option value="innovation">Innovation</option>
                </select>
            </div>
            <div class="filter-group date-filter">
                <label for="date-select">Date:</label>
                <select id="date-select">
                    <option value="newest">Plus récent</option>
                    <option value="oldest">Plus ancien</option>
                </select>
            </div>
        </div>

        <div class="magazines-grid">
            @foreach ($magazines as $magazine)
            <div class="magazine-card" data-themes="{{ $magazine->themes ?? '' }}" data-date="{{ $magazine->created_at->format('Y-m-d') }}">
                <div class="magazine-cover">
                    <span class="magazine-number">N° {{ $magazine->number }}</span>
                </div>
                <div class="magazine-info">
                    <h2>Magazine {{ $magazine->number }}</h2>
                    <p>Publié le : {{ $magazine->created_at->format('d/m/Y H:i') }}</p>
                    <p>Articles : {{ $magazine->articles->count() }} </p>
                    <a href="{{ url('magazines_details', $magazine->id) }}" class="view-details-btn">Voir les détails</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <script src="{{ asset('js/abonne/magazine.js') }}"></script>

</body>
</html>

