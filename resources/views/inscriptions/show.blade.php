@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3>Détails de l'Inscription</h3>
                    <div>
                        <a href="{{ route('inscriptions.edit', $inscription) }}" class="btn btn-warning">Modifier</a>
                        <a href="{{ route('inscriptions.index') }}" class="btn btn-secondary">Retour</a>
                    </div>
                </div>

                <div class="card-body">
                    <div class="mb-3">
                        <strong>ID:</strong> {{ $inscription->id }}
                    </div>

                    <div class="mb-3">
                        <strong>Étudiant:</strong> {{ $inscription->nom_apprenant }}
                    </div>

                    @if($inscription->formation)
                        <div class="mb-3">
                            <strong>Formation:</strong> {{ $inscription->formation->title }}
                        </div>
                        <div class="mb-3">
                            <strong>Description de la formation:</strong>
                            <p>{{ $inscription->formation->description ?? 'Aucune description' }}</p>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <strong>Durée:</strong> {{ $inscription->formation->duree }} heures
                                </div>
                            </div>

                            
                        </div>
                    @else
                        <div class="alert alert-warning">
                            <strong>Attention:</strong> La formation associée à cette inscription a été supprimée.
                        </div>
                    @endif

                    <div class="mb-3">
                        <strong>Date d'inscription:</strong> {{ $inscription->date_inscription->format('d/m/Y') }}
                    </div>

                    <div class="mb-3">
                        <strong>Date de création:</strong> {{ $inscription->created_at->format('d/m/Y H:i') }}
                    </div>

                    <div class="mb-3">
                        <strong>Dernière modification:</strong> {{ $inscription->updated_at->format('d/m/Y H:i') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection