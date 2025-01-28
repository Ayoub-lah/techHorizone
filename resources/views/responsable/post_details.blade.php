@extends('layouts.responsable')

@section('title', 'Article Details')

@section('content')
    <div class="article-container">
        <!-- Article Picture -->
        <div class="article-picture">
            <img src="{{ asset('img/' . $article->image) }}" alt="Article Image">
        </div>

        <!-- Article Title and Recommander Button -->
        <div class="article-header">
            <h1 class="article-title">{{ $article->title }}</h1>

            <form action="{{ route('responsable.post_details.recomand', $article->id) }}" method="POST" style="display: inline;">
                @csrf
                <button type="submit" class="recommander-btn">Recommander</button>
            </form>



        </div>

        <!-- Author and Date -->
        <div class="article-meta">
            <span class="author">Par : {{ $article->user->name }}</span>
            <span class="date">Publié en :{{ $article->created_at->format('d/m/Y H:i')}}</span>
        </div>

        <!-- Article Content -->
        <div class="article-content">
            <p>{{ $article->content }}</p>
        </div>

        <!-- Comments Section -->
        <div class="comments-section">
            <h2>Comments</h2>
            <div class="comments-list">
                @foreach ($comments as $comment)
                    <div class="comment">
                        <p class="comment-author">{{ $comment->user->name }}</p>
                        <p class="comment-content">{{ $comment->content }}</p>

                        <form action="{{ route('delete_comment', $comment->id) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="delete-comment">Delete</button>
                        </form>
                    </div>
                @endforeach
            </div>

            <!-- Comment Form -->
            <form class="comment-form" action="{{ route('comment_post') }}" method="POST">
                @csrf
                <input type="hidden" name="article_id" value="{{ $article->id }}">
                <textarea name="comment" placeholder="Laissez votre commentaire..." required></textarea>
                <button type="submit" class="comment-btn">Publier</button>
            </form>
        </div>
    </div>

   <link rel="stylesheet" href="{{asset('css/responsable/post_detailsResp.css')}}">
@endsection
