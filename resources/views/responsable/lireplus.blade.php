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
    </div>

    <link rel="stylesheet" href="{{asset('css/responsable/lireplus.css')}}">

@endsection

