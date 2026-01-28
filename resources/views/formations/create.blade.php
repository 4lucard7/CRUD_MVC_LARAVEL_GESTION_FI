@extends('layouts.app')

@section('title', 'Créer une Formation')

@section('content')
<div class="row">
    <div class="col-md-8 offset-md-2">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0"><i class="fas fa-plus-circle"></i> Créer une Nouvelle Formation</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('formations.store') }}" method="POST">
                    @csrf

                    <!-- Titre -->
                    <div class="mb-3">
                        <label for="title" class="form-label">Titre de la formation <span class="text-danger">*</span></label>
                        <input type="text" 
                               class="form-control @error('title') is-invalid @enderror" 
                               id="title" 
                               name="title" 
                               value="{{ old('title') }}" 
                               placeholder="Ex: Laravel pour débutants"
                               required>
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Description -->
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" 
                                  id="description" 
                                  name="description" 
                                  rows="4" 
                                  placeholder="Décrivez le contenu de la formation...">{{ old('description') }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Durée -->
                    <div class="mb-3">
                        <label for="duree" class="form-label">Durée (en heures) <span class="text-danger">*</span></label>
                        <input type="number" 
                               class="form-control @error('duree') is-invalid @enderror" 
                               id="duree" 
                               name="duree" 
                               value="{{ old('duree') }}" 
                               min="1" 
                               placeholder="Ex: 40"
                               required>
                        @error('duree')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Boutons -->
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('formations.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Retour
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Enregistrer
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection