@extends('layouts.sidebar')
@section('sidebar')
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/abonne/proposition.css') }}">

    <title>Proposer un article - Tech Horizons</title>
    <link href="" rel="stylesheet">
    <style>
        

       
        
    </style>
</head>
<body>
   

    <main class="main-content">
        <div class="container">
           
            
            @if (session('success'))
                <div class="alert">
                    <i class="fas fa-check-circle"></i> {{ session('success') }}
                </div>
            @endif

            <h1><i class="fas fa-pen-fancy"></i> Proposer un article</h1>
            
            <form method="POST" action="{{ url('user_post') }}" >
                @csrf
                <div class="form-group">
                    <label for="title"><i class="fas fa-heading"></i> Titre de l'article</label>
                    <input type="text" name="title" id="title" placeholder="Entrez le titre de l'article" required>
                </div>

                <div class="form-group">
                    <label for="theme"><i class="fas fa-tags"></i> Thème</label>
                    <select name="theme" id="theme" required>
                        <option value="" disabled selected>Choisissez un thème</option>
                        @foreach ($themes as $theme)
                            <option value="{{$theme->id}}">{{$theme->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="description"><i class="fas fa-align-left"></i> Description</label>
                    <textarea name="description" id="description" rows="4" placeholder="Décrivez votre article" required></textarea>
                </div>

                <div class="form-group">
                    <label for="image"><i class="fas fa-image"></i> Image</label>
                    <div class="file-input-wrapper">
                        <button class="btn-file">Choisir une image</button>
                        <input type="file" name="image"  required>
                    </div>
                </div>

                <button type="submit"><i class="fas fa-paper-plane"></i> Soumettre la proposition</button>
            </form>
        </div>
    </main>
    <script src="{{ asset('js/abonne/proposition.js') }}"></script>
</body>
</html>