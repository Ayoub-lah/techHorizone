@extends('layouts.sidebar')
@section('sidebar')

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/abonne/abonnement.css') }}">
    <title>Gérer mes abonnements - Tech Horizons</title>
</head>
<body>
    <main class="main-content" id="mainContent">
        <div class="container">
            <h1>Gérer mes abonnements</h1>

            <section class="theme-section">
                <h2>Mes thèmes abonnés</h2>
                <div class="theme-list" id="subscribedThemes">
                    @foreach ($themes as $theme)
                        @if (in_array($theme->id, $subscribedThemeIds))
                            <div class="theme-card">
                                <h3>{{ $theme->name }}</h3>
                                <p>{{ $theme->description }}</p>
                                <form action="{{ route('toggle-subscription', $theme->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-unsubscribe">Se désabonner</button>
                                </form>
                            </div>
                        @endif
                    @endforeach
                </div>
            </section>

            <section class="theme-section">
                <h2>Thèmes disponibles</h2>
                <div class="theme-list" id="availableThemes">
                    @foreach ($themes as $theme)
                        @if (!in_array($theme->id, $subscribedThemeIds))
                            <div class="theme-card">
                                <h3>{{ $theme->name }}</h3>
                                <p>{{ $theme->description }}</p>
                                <form action="{{ route('toggle-subscription', $theme->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-subscribe">S'abonner</button>
                                </form>
                            </div>
                        @endif
                    @endforeach
                </div>
            </section>
        </div>
    </main>
</body>
</html>