<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechHorizons - Publications</title>
    <link rel="stylesheet" href="{{ asset('css/abonne/abonne.css') }}">
    <script src="{{ asset('js/abonne/abonne.js') }}"></script>

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
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit">Log Out</button>
                </form>
            </div>
        </div>
    </header>

    <!-- Sidebar -->
    <div class="sidebar">
        <h2>Mon Espace</h2>
        <a href="abonnement">Mes Abonnements</a>
        <a href="historique">Historique de Navigation</a>
        <a href="article">Mes Articles</a>
        <a href="magazine">Magazines</a>

        <a href="#"></a>
        <h2>Actions</h2>
        <a href="proposition" class="btn-primary">Proposer un article</a>
    </div>

    
    
    <!-- Main Content -->
    <main>
          <h1 class="titre">Bienvenue {{auth()->user()->name}}</h1>
        
        <div class="magazines-page">
            <div class="magazines-container">
                <button class="nav-button prev" id="magazinePrevBtn">&lt;</button>
                <button class="nav-button next" id="magazineNextBtn">&gt;</button>
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
        </div>
        <div class="section-gradient"></div>

    
        <div class="container">
            <h1 class="page-title">Nos Themes</h1>

            <div class="posts-container">
                <button class="nav-button prev" id="postPrevBtn">&lt;</button>
                <button class="nav-button next" id="postNextBtn">&gt;</button>
                <div class="posts-grid">
                    @foreach ($posts as $post)
                        <article class="post-card">
                            @if($post->image)
                                <div class="post-image-container">
                                    <img src="{{ asset('img/' . $post->image) }}"  class="post-image" alt="{{ $post->title }}">
                                </div>
                            @endif
                            <div class="post-content-wrapper">
                                <div class="post-author">
                                    Publié par l'utilisateur : {{$post->user_id}}
                                </div>
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
                                <h2 class="post-title">Themes: {{$post->theme->name}}</h2>
                                <div class="post-description">
                                    {{ Str::limit($post->content, 150) }}
                                </div>
                                <div class="post-footer">
                                    <a href="{{url('article_details',$post->id)}}" class="read-more-btn">
                                        Lire plus
                                    </a>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- Right Sidebar recommendation -->
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
    </main>
    
</body>
</html>