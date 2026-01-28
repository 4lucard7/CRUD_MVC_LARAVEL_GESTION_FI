@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    <h3>Modifier l'Inscription</h3>
                </div>

                <div class="card-body">
                    <form action="{{ route('inscriptions.update', $inscriptions->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        {{-- Nom apprenant --}}
                        <div class="mb-3">
                            <label for="nom_apprenant" class="form-label">Nom de l'étudiant *</label>
                            <input type="text"
                                   class="form-control @error('nom_apprenant') is-invalid @enderror"
                                   id="nom_apprenant"
                                   name="nom_apprenant"
                                   value="{{ old('nom_apprenant', $inscriptions->nom_apprenant) }}"
                                   required>
                            @error('nom_apprenant')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        {{-- Email apprenant --}}
                        <div class="mb-3">
                            <label for="email" class="form-label">Email *</label>
                            <input type="email"
                                   class="form-control @error('email') is-invalid @enderror"
                                   id="email"
                                   name="email"
                                   value="{{ old('email', $inscriptions->email) }}"
                                   required>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        {{-- Formation (sans prix) --}}
                        <div class="mb-3">
                            <label for="formation_id" class="form-label">Formation *</label>
                            <select class="form-select @error('formation_id') is-invalid @enderror"
                                    id="formation_id"
                                    name="formation_id"
                                    required>
                                <option value="">-- Sélectionner une formation --</option>
                                @foreach($formations as $formation)
                                    <option value="{{ $formation->id }}"
                                        {{ old('formation_id', $inscriptions->formation_id) == $formation->id ? 'selected' : '' }}>
                                        {{ $formation->title }}
                                    </option>
                                @endforeach
                            </select>
                            @error('formation_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Date inscription --}}
                        <div class="mb-3">
                            <label for="date_inscription" class="form-label">Date d'inscription *</label>
                            <input type="date"
                                   class="form-control @error('date_inscription') is-invalid @enderror"
                                   id="date_inscription"
                                   name="date_inscription"
                                   value="{{ old('date_inscription', $inscriptions->date_inscription->format('Y-m-d')) }}"
                                   required>
                            @error('date_inscription')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('inscriptions.index') }}" class="btn btn-secondary">Annuler</a>
                            <button type="submit" class="btn btn-primary">Mettre à jour</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
