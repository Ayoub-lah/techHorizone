@extends('layouts.sidebar')
@section('sidebar')
<link rel="stylesheet" href="{{ asset('css/abonne/articles.css') }}">
<div class="page-container">
    <h1 class="page-title">Liste des Articles</h1>
    <div class="table-container">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Titre</th>
                    <th>Contenu</th>
                    <th>Image</th>
                    <th>État</th>
                    <th>ID Utilisateur</th>
                    <th>ID Thème</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($post as $post)
                <tr>
                    <td>{{ $post->id }}</td>
                    <td>{{ $post->title }}</td>
                    <td>
                        <div class="content-preview">
                            {{ Str::limit($post->content, 100) }}
                        </div>
                    </td>
                    <td>
                        <img src="{{ asset('img/' . $post->image) }}" alt="Image de l'article" class="post-image">
                    </td>
                    <td>
                        <span class="status-badge 
                            @if(strtolower($post->state) === 'en attente') status-pending 
                            @elseif(strtolower($post->state) === 'refus') status-rejected 
                            @elseif(strtolower($post->state) === 'actif') status-published 
                            @else status-draft 
                            @endif">
                            {{ $post->state }}
                        </span>
                    </td>
                    <td>{{ $post->user_id }}</td>
                    <td>{{ $post->theme_id }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<style>


</style>
@endsection