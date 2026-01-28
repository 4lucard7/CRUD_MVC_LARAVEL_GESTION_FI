@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3>Liste des Inscriptions</h3>
                    <a href="{{ route('inscriptions.create') }}" class="btn btn-primary">
                        Nouvelle Inscription
                    </a>
                </div>

                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Étudiant</th>
                                <th>Date d'inscription</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($inscriptions as $inscription)
                                <tr>
                                    <td>{{ $inscription->id }}</td>
                                    <td>{{ $inscription->nom_apprenant }}</td>
                                    <td>{{ $inscription->date_inscription->format('d/m/Y') }}</td>
                                    <td>
                                        <a href="{{ route('inscriptions.show', $inscription) }}" class="btn btn-sm btn-info">Voir</a>
                                        <a href="{{ route('inscriptions.edit', $inscription) }}" class="btn btn-sm btn-warning">Modifier</a>
                                        <form action="{{ route('inscriptions.delete', $inscription) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Êtes-vous sûr ?')">Supprimer</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center">Aucune inscription trouvée</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection