@extends('layouts.app')

@section('title', 'Liste des Formations')

@section('content')
<div class="row mb-4">
    <div class="col-md-8">
        <h1><i class="fas fa-book"></i> Liste des Formations</h1>
    </div>
    <div class="col-md-4 text-end">
        <a href="{{ route('formations.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Nouvelle Formation
        </a>
    </div>
</div>

@if($formations->isEmpty())
    <div class="alert alert-info">
        <i class="fas fa-info-circle"></i> Aucune formation disponible pour le moment.
    </div>
@else
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Titre</th>
                            <th>Description</th>
                            <th>Durée (heures)</th>
                            <th>Date création</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($formations as $formation)
                            <tr>
                                <td>{{ $formation->id }}</td>
                                <td><strong>{{ $formation->title }}</strong></td>
                                <td>{{ Str::limit($formation->description, 50) }}</td>
                                <td>
                                    <span class="badge bg-info">{{ $formation->duree }}h</span>
                                </td>
                                <td>{{ $formation->created_at->format('d/m/Y') }}</td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('formations.show', $formation) }}" 
                                           class="btn btn-sm btn-info" 
                                           title="Voir">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('formations.edit', $formation) }}" 
                                           class="btn btn-sm btn-warning" 
                                           title="Modifier">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('formations.delete', $formation) }}" 
                                              method="POST" 
                                              class="d-inline"
                                              onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette formation ?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                    class="btn btn-sm btn-danger" 
                                                    title="Supprimer">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    
@endif
@endsection