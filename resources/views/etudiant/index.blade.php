@extends('layouts.app')
@section('title', 'Etudiants List')
@section('content')
<h1 class="mt-5 mb-4">Liste des etudiants </h1>
<div class="row">
    @forelse($etudiants as $etudiant)
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
        <div class="card h-100">
            <div class="card-body d-flex flex-column">
                <h5 class="card-title">{{ $etudiant->nom }}</h5>
                <h6 class="card-subtitle mb-2 text-body-secondary">
                    {{ $etudiant->date_de_naissance }}
                </h6>
                <p class="card-text">{{ $etudiant->adresse }}</p>
                <div class="mt-auto">
                    <a href="{{route('etudiant.show', $etudiant->id)}}" class="card-link">Voir</a>
                </div>
            </div>
        </div>
    </div>
    @empty
    <div class="alert alert-danger">There are no etudiants to be displayed!</div>
    @endforelse
</div>
@endsection