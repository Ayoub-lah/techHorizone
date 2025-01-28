@extends('layouts.responsable')

@section('title', 'Abonnés')

@section('content')
    <header class="header">
        <h1>Liste des Abonnés</h1>
    </header>

    <div class="subscribers-list">

        @foreach ($subscriptions as $subscription)
        <div class="subscriber-item">
            <div style="display: flex; align-items: center;">
                <div class="subscriber-avatar">{{Str::limit($subscription->user->name,2,'')}}</div>
                <div class="subscriber-info">
                    <div class="subscriber-name">{{$subscription->user->name}}</div>
                    <div class="subscriber-email">{{$subscription->user->email}}</div>
                </div>
            </div>
            <div style="display: flex; align-items: center; gap: 1rem;">
                <form action="{{route('responsable.delete_subscription')}}" method="POST">
                @method('DELETE')
                @csrf
                <input type="hidden" name="subscription_id" value="{{$subscription->id}}">
                <button class="button button-danger">Supprimer</button>
                </form>
            </div>
        </div>
        @endforeach

    </div>

<link rel="stylesheet" href="{{asset('css/responsable/subcriptionsResp.css')}}">
@endsection
