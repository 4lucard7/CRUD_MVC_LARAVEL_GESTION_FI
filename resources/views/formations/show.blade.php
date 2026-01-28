@extends('layouts.app')

@section('title', 'Détails de la Formation')

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header bg-info text-white d-flex justify-content-between align-items-center">
                <h4 class="mb-0"><i class="fas fa-book"></i> Détails de la Formation</h4>
                <div>
                    <a href="{{ route('formations.edit', $formation) }}" class="btn btn-warning btn-sm">
                        <i class="fas fa-edit"></i> Modifier
                    </a>
                    <form action="{{ route('formations.delete', $formation) }}"
                        method="POST"
                        class="d-inline"
                        onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette formation ?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">
                            <i class="fas fa-trash"></i> Supprimer
                        </button>
                    </form>
                </div>
            </div>
            <div class="card-body">
                <dl class="row">
                    <dt class="col-sm-3">ID:</dt>
                    <dd class="col-sm-9">{{ $formation->id }}</dd>

                    <dt class="col-sm-3">Titre:</dt>
                    <dd class="col-sm-9"><strong>{{ $formation->title }}</strong></dd>

                    <dt class="col-sm-3">Description:</dt>
                    <dd class="col-sm-9">{{ $formation->description ?? 'Aucune description' }}</dd>

                    <dt class="col-sm-3">Durée:</dt>
                    <dd class="col-sm-9">
                        <span class="badge bg-info">{{ $formation->duree }} heures</span>
                    </dd>

                    <dt class="col-sm-3">Créée le:</dt>
                    <dd class="col-sm-9">{{ $formation->created_at->format('d/m/Y à H:i') }}</dd>

                    <dt class="col-sm-3">Modifiée le:</dt>
                    <dd class="col-sm-9">{{ $formation->updated_at->format('d/m/Y à H:i') }}</dd>
                </dl>
            </div>
        </div>

        <div class="mt-3">
            <a href="{{ route('formations.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Retour à la liste
            </a>
        </div>
    </div>

    <!-- Liste des inscriptions -->
    <div class="col-md-4">
        <div class="card">
            <div class="card-header bg-success text-white">
                <h5 class="mb-0">
                    <i class="fas fa-users"></i>
                    Inscriptions ({{ $formation->inscriptions->count() }})
                </h5>
            </div>
            <div class="card-body">
                @if($formation->inscriptions->isEmpty())
                <p class="text-muted">Aucune inscription pour cette formation.</p>
                @else
                <ul class="list-group">
                    @foreach($formation->inscriptions as $inscription)
                    <li class="list-group-item">
                        <div>
                            <strong>{{ $inscription->nom_apprenant }}</strong><br>
                            <small class="text-muted">
                                <i class="fas fa-envelope"></i> {{ $inscription->email }}<br>
                                <i class="fas fa-calendar"></i> {{ $inscription->date_inscription->format('d/m/Y') }}
                            </small>
                        </div>
                        <div class="mt-2">
                            <a href="{{ route('inscriptions.show', $inscription) }}"
                                class="btn btn-sm btn-info">
                                Voir détails
                            </a>
                        </div>
                    </li>
                    @endforeach
                </ul>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection