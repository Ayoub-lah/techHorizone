@extends('layouts.accueilafterlogin')
@section('content2')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/abonne/publication.css') }}">

    <title>Publications</title>
    <style>
        
    </style>
</head>
<body>
    <div class="container">
        <div class="posts-grid">
            @foreach ($posts as $post)
                <article class="post-card">
                    @if($post->image)
                        <div class="post-image-container">
                            <img src="{{ asset('postimage/' . $post->image) }}"  class="post-image">
                        </div>
                    @endif
                    <div class="post-content-wrapper">
                        <div class="post-author">
                            Publié par l'utilisateur : {{$post->user_id}}
                        </div>
                        <h2 class="post-title">{{$post->title}}</h2>
                        <div class="post-description">
                            
                        </div>
                        <div class="post-footer">
                            <a href="{{url('article_details',$post->id)}}" class="read-more-btn" >
                                Lire plus
                            </a>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</body>
</html>
@endsection