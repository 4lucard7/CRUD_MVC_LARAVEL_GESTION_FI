@extends('layouts.app')

@section('title', 'Modifier la Formation')

@section('content')
<div class="row">
    <div class="col-md-8 offset-md-2">
        <div class="card">
            <div class="card-header bg-warning text-dark">
                <h4 class="mb-0"><i class="fas fa-edit"></i> Modifier la Formation</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('formations.update', $formations) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- Titre -->
                    <div class="mb-3">
                        <label for="title" class="form-label">Titre de la formation <span class="text-danger">*</span></label>
                        <input type="text" 
                               class="form-control @error('title') is-invalid @enderror" 
                               id="title" 
                               name="title" 
                               value="{{ old('title', $formations->title) }}" 
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
                                  rows="4">{{ old('description', $formations->description) }}</textarea>
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
                               value="{{ old('duree', $formations->duree) }}" 
                               min="1" 
                               required>
                        @error('duree')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Boutons -->
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('formations.show', $formations) }}" class="btn btn-secondary">
                            <i class="fas fa-times"></i> Annuler
                        </a>
                        <button type="submit" class="btn btn-warning">
                            <i class="fas fa-save"></i> Mettre à jour
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection