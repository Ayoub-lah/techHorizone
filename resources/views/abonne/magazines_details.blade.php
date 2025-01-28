
@extends('layouts.sidebar')
@section('sidebar')

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/abonne/magazine_details.css') }}">

    <title>TechHorizons - Articles</title>
    <style>
        
    </style>
</head>
<body>
    <!-- Header -->
    <header>
        <a href="/" class="logo">TechHorizons</a>
        <div>
            <div class="profile-circle" title="Profil">
                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
            </div>
            <div class="dropdown-menu">
                <a href="/notifications">Notifications</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit">Se déconnecter</button>
                </form>
            </div>
        </div>
    </header>

    <!-- Page Layout -->
    <div class="page-layout">
       

        <!-- Main Content -->
        <main class="main-content">
            <div class="posts-list">
                @foreach ($posts as $post)
                    <article class="post-card">
                        <div class="post-content">
                            <div class="post-author">
                                Publié par l'utilisateur : {{ $post->user_id }}
                            </div>
                            <a href="{{ url('article_details', $post->id) }}" class="post-title">
                                {{ $post->title }}
                            </a>
                            <div class="post-description">
                                <div class="stat">
                                    <span class="icon"><svg class="icon" viewBox="0 0 24 24" width="24" height="24">
                                        <path fill="currentColor" d="M20 2H4c-1.1 0-2 .9-2 2v18l4-4h14c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zm0 14H6l-2 2V4h16v12z"/>
                                    </svg></span>
                                    <span class="count">{{ $post->comments->count() }}</span> commentaires
                                </div>
                                <div class="stat">
                                    <span class="icon"><svg class="icon" viewBox="0 0 24 24" width="24" height="24">
                                        <path fill="currentColor" d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zM12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3z"/>
                                    </svg></span>
                                    <span class="count">{{ $post->visits->count() }}</span> vues
                                </div>
                            </div>
                        </div>
                        @if($post->image)
                            <img src="{{ asset('img/' . $post->image) }}" alt="{{ $post->title }}" class="post-image">
                        @endif
                    </article>
                @endforeach
            </div>
        </main>

        <!-- Right Sidebar -->
        <aside class="sidebar-right">
            <div class="sidebar-section">
                <h3 class="sidebar-title">Articles recommandés</h3>
                @foreach ($recomm->take(4) as $recommendedPost)
                    <a href="{{ url('article_details', $recommendedPost->id) }}" class="recommended-post">
                        @if($recommendedPost->image)
                            <img src="{{ asset('img/' . $recommendedPost->image) }}" alt="{{ $recommendedPost->title }}" class="recommended-image">
                        @endif
                        <div class="recommended-content">
                            <h4 class="recommended-title">{{ $recommendedPost->title }}</h4>
                            <div class="recommended-author">
                                Utilisateur {{ $recommendedPost->user_id }}
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </aside>
    </div>
</body>
</html>