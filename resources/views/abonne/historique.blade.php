@extends('layouts.sidebar')
@section('sidebar')
<link rel="stylesheet" href="{{ asset('css/abonne/historique.css') }}">
<script src="{{ asset('js/abonne/historique.js') }}"></script>

<div class="history-page">
    <div class="back-arrow">
       
    </div>
    <div class="container">
        <h2 class="page-title">Historique de Navigation</h2>
        <div class="table-container">
            <div class="table-header">
                <div class="search-box">
                    <input type="text" placeholder="Rechercher..." id="searchInput">
                    
                </div>
                <div class="filter-box">
                    <select id="filterSelect">
                        <option value="">Tous les articles</option>
                        <option value="recent">Articles récents</option>
                        <option value="old">Anciens articles</option>
                    </select>
                </div>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID <span class="sort-icon">&#8597;</span></th>
                        <th>Article <span class="sort-icon">&#8597;</span></th>
                        <th>Utilisateur <span class="sort-icon">&#8597;</span></th>
                        <th>Date de Visite <span class="sort-icon">&#8597;</span></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($visits as $visit)
                        <tr>
                            <td>{{ $visit->id }}</td>
                            <td>{{ $visit->article->title ?? 'Article Supprimé' }}</td>
                            <td>{{ $visit->user->name ?? 'Utilisateur Inconnu' }}</td>
                            <td>{{ $visit->created_at->format('d/m/Y H:i') }}</td>
                            
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">Aucune visite enregistrée</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="pagination">
           
                
           
            <!-- Bouton "Précédent" -->
            <button class="pagination-btn" {{ $visits->onFirstPage() ? 'disabled' : '' }}>
                <a href="{{ $visits->previousPageUrl() }}">&laquo; Précédent</a>
            </button>
        
            <!-- Informations sur la pagination -->
            <span class="pagination-info">
                Page {{ $visits->currentPage() }} sur {{ $visits->lastPage() }}
            </span>
        
            <!-- Bouton "Suivant" -->
            <button class="pagination-btn" {{ !$visits->hasMorePages() ? 'disabled' : '' }}>
                <a href="{{ $visits->nextPageUrl() }}">Suivant &raquo;</a>
            </button>
             
        </div>
    </div>
</div>

<style>

</style>


@endsection

