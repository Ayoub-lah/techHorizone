
@extends('layouts.accueilafterlogin')
@section('content2')

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/abonne/categorie.css') }}">
    <title>TechHorizons - Choisissez vos intérêts</title>
    <style>
    </style>
</head>
<body>
   

    <div class="container">
        <h1>Quels sont vos centres d'intérêt ?</h1>
        <p class="subtitle">Choisissez trois sujets ou plus.</p>
        
        <!-- Form to submit selected themes -->
        <form id="interestsForm" action="{{ route('save.themes') }}" method="POST">
            @csrf
            <div class="topics-container" id="topicsContainer"></div>
            <input type="hidden" name="themes" id="themesInput">
            <button type="submit" class="continue-button" id="continueButton">Continuer</button>
        </form>
    </div>

    <script src="{{ asset('js/abonne/categorie.js') }}"></script>

</body>
</html>