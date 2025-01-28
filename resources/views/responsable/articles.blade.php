@extends('layouts.responsable')

@section('title', 'Articles')

@section('content')
    <header class="header">
        <h1>Articles Proposés</h1>
    </header>
@foreach($articles as $article)
    <div class="articles-list">
        <div class="article-item">
            <div class="article-content">
                <h2 class="article-title">{{$article->title}}</h2>
                <div class="article-meta">Par : {{$article->user->name}} </div>
                <p class="article-excerpt">
                    {{Str::limit($article->content,150)}}                </p>
                <div class="article-actions">
                    <form action="{{ route('responsable.articles.reject', $article->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="button button-danger">Rejeter</button>
                    </form>

                    <form action="{{ route('responsable.articles.publish', $article->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="button button-success">Accepter</button>
                    </form>
                    <div>
                        <button> <a class="button button-plus" href="{{route('responsable.lireplus', $article->id) }}">Lire Plus</a></button>
                      </div>
                </div>
            </div>
            <img src="{{ asset('img/' . $article->image) }}" alt="L'avenir de l'IA générative" class="article-image">
        </div>
    </div>
@endforeach
   <link rel="stylesheet" href="{{asset('css/responsable/articleResp.css')}}">
@endsection
