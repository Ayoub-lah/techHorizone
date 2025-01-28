@extends('layouts.sidebar')
@section('sidebar')
<link rel="stylesheet" href="{{ asset('css/abonne/article_details.css') }}">
<script src="{{ asset('js/abonne/article_details.js') }}"></script>

<div class="container">
    <div class="posts-grid">
        <article class="post-card">
            @if($article->image)
                <div class="post-image-container">
                    <img src="{{ asset('img/' . $article->image) }}" class="post-image">
                </div>
            @endif
            <div class="post-content-wrapper">
                <div class="post-author">
                    Publié par l'utilisateur : {{ $article->user->name ?? 'Anonyme' }}
                </div>
                <h2 class="post-title">{{ $article->title }}</h2>
                <div class="post-description">
                    <p>{{ $article->content }}</p>
                </div>
                
                <!-- Système de notation numérique -->
                <div class="rating-container">
                    <h3>Noter cet article</h3>
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ url('rating_post') }}" method="POST" class="rating-form">
                        @csrf
                        <input type="hidden" name="article_id" value="{{ $article->id }}">
                        <div class="number-rating">
                            @for ($i = 1; $i <= 5; $i++)
                                <label class="rating-number">
                                    <input type="radio" name="rating" value="{{ $i }}" required>
                                    <span class="number">{{ $i }}</span>
                                </label>
                            @endfor
                        </div>
                        <button type="submit" class="rating-btn">Noter</button>
                    </form>
                </div>

                <!-- Section commentaires -->
                <div class="comments-section">
                    <h3>Commentaires</h3>
                    <form class="comment-form" action="{{ url('comment_post') }}" method="POST">
                        @csrf
                        <input type="hidden" name="article_id" value="{{ $article->id }}">
                        <textarea name="comment" placeholder="Laissez votre commentaire..." required></textarea>
                        <button type="submit" class="comment-btn">Publier</button>
                    </form>

                    <div class="comments-list">
                        @foreach($comments as $comment)
                            <!-- Vérifier si ce commentaire est un commentaire parent (pas une réponse) -->
                            @if(!$comment->parent_id)
                                <div class="comment">
                                    <div class="comment-header">
                                        <span class="comment-author">{{ $comment->user->name ?? 'Anonyme' }}</span>
                                        <span class="comment-date">{{ $comment->created_at->format('d/m/Y H:i') }}</span>
                                    </div>
                                    <div class="comment-content">
                                        {{ $comment->content }}
                                    </div>
                        
                                    <!-- Bouton pour répondre -->
                                    <button class="reply-trigger">Répondre</button>
                                    <div class="reply-form" style="display: none;">
                                        <form action="{{ route('reply.post', $comment->id) }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="article_id" value="{{ $article->id }}">
                                            <input type="hidden" name="parent_id" value="{{ $comment->id }}">
                                            <textarea name="reply" placeholder="Votre réponse..." required></textarea>
                                            <div class="reply-buttons">
                                                <button type="submit" class="reply-btn reply-submit">Envoyer</button>
                                                <button type="button" class="reply-btn reply-cancel">Annuler</button>
                                            </div>
                                        </form>
                                    </div>
                        
                                    <!-- Afficher uniquement les réponses à ce commentaire parent -->
                                    <div class="replies" style="margin-left: 30px;">
                                        @foreach($comments->where('parent_id', $comment->id) as $reply)
                                            <div class="comment reply">
                                                <div class="comment-header">
                                                    <span class="comment-author">{{ $reply->user->name ?? 'Anonyme' }}</span>
                                                    <span class="comment-date">{{ $reply->created_at->format('d/m/Y H:i') }}</span>
                                                </div>
                                                <div class="comment-content">
                                                    <strong>Réponse à {{ $comment->user->name ?? 'Anonyme' }} :</strong>
                                                    {{ $reply->content }}
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>


@endsection