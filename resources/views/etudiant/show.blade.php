@extends('layouts.app')
@section('title', 'Etudiant')
@section('content')

<h1 class="mt-5 mb-4 text-center">Étudiant</h1>
<div class="container">
    <div class="row justify-content-center mt-5 mb-5">

        <div class="col-12 col-sm-8 col-md-6 col-lg-4 mb-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title text-center">{{ $etudiant->nom }}</h5>
                    <h6 class="card-subtitle mb-2 text-muted text-center">
                        {{ $etudiant->date_de_naissance }}
                    </h6>
                    <p class="card-text mb-1 text-center">{{ $etudiant->adresse }}</p>
                    <p class="card-text mb-1 text-center">{{ $etudiant->telephone }}</p>
                    <p class="card-text mb-3 text-center">{{ $etudiant->email }}</p>
                    @foreach($villes as $ville)
                    @if($ville->id == $etudiant->ville_id)
                    <p class="card-text mb-3 text-center"> {{ $ville->nom }} </p>
                    @endif
                    @endforeach
                    <div class="d-flex justify-content-center gap-2 mt-auto">
                        <a href="{{ route('etudiant.edit', $etudiant->id) }}" class="btn btn-secondary">
                            Modifier
                        </a>
                        <form method="post">
                            @csrf
                            @method('delete')
                            <input type="submit" class="btn btn-danger" value="Supprimer">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection