@extends('layouts.responsable')

@section('title', 'Tableau de Bord')

@section('content')
    <header class="header">
        <h1>Tableau de Bord </h1>
    </header>

    <div class="stats-grid">
        <div class="stat-card">
            <h3 class="stat-title">Total des abonnés</h3>
            <p class="stat-value">{{ $totalSubscribers }}</p>

        </div>
        <div class="stat-card">
            <h3 class="stat-title">Articles publiés</h3>
            <p class="stat-value">{{ $totalArticles }}</p>

        </div>
        <div class="stat-card">
            <h3 class="stat-title">Commentaires</h3>
            <p class="stat-value">{{ $totalComments }}</p>

        </div>
    </div>

    <div class="dashboard-grid">
        <div class="dashboard-card">
            <h2 class="dashboard-card-title">Articles populaires</h2>
            <ul class="popular-articles-list">
                <li class="popular-article-item">
                    <span class="article-title">L'avenir de l'IA dans l'industrie automobile</span>
                    <span class="article-views">2,345 vues</span>
                </li>
                <li class="popular-article-item">
                    <span class="article-title">Comment l'IA révolutionne la médecine</span>
                    <span class="article-views">1,982 vues</span>
                </li>
                <li class="popular-article-item">
                    <span class="article-title">Les défis éthiques de l'IA</span>
                    <span class="article-views">1,756 vues</span>
                </li>
            </ul>
        </div>
    </div>

    <link rel="stylesheet" href="{{asset('css/responsable/dashboardResp.css')}}">
@endsection
