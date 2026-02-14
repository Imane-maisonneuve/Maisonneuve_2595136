@extends('layouts.app')
@section('title', 'Etudiant')
@section('content')

<h1 class="mt-5 mb-4 text-center">Étudiant</h1>
<div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
    <div class="card h-100">
        <div class="card-body d-flex flex-column">
            <h5 class="card-title">{{ $etudiant->nom }}</h5>
            <h6 class="card-subtitle mb-2 text-body-secondary">
                {{ $etudiant->date_de_naissance }}
            </h6>
            <p class="card-text">{{ $etudiant->adresse }}</p>
            <p class="card-text">{{ $etudiant->telephone }}</p>
            <p class="card-text">{{ $etudiant->email }}</p>
            <div class="d-flex justify-content-between align-items-center gap-2">
                <a href="{{ route('etudiant.edit', $etudiant->id)}}" class="btn btn-secondary">Modifier</a>
                <form method="post">
                    @csrf
                    @method('delete')
                    <input type="submit" class="btn btn-danger" value="Supprimer">
                </form>
            </div>
        </div>
    </div>
</div>
@endsection