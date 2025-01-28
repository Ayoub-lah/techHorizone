@extends('layouts.responsable')

@section('title', 'Modération')

@section('content')
<div class="blog-posts">
    @foreach($articles as $article)
    <article class="blog-post">
        <div class="post-image">
            <img src="{{ asset('img/' . $article->image)}}" >
        </div>
        <div class="post-content">
            <h2 class="post-title">{{ $article->title }}</h2>
            <p class="post-author">Par : {{ $article->user->name }}</p>
        </div>

        <div class="post-footer">
           <a class="read-more" href="{{route('responsable.post_details', $article->id) }}">Lire Plus</a>
        </div>
    </article>
    @endforeach
</div>

<link rel="stylesheet" href="{{asset('css/responsable/moderationResp.css')}}">
@endsection
