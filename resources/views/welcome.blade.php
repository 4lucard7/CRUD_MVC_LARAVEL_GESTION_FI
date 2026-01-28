@extends('layouts.app')

@section('title', 'Accueil - Gestion des Formations')

@section('content')
<!-- Hero Section -->
<div class="text-center py-5 mb-5">
    <h1 class="display-3 fw-bold text-primary">
        <i class="fas fa-graduation-cap"></i>
        Gestion des Formations
    </h1>
    <p class="lead text-muted mt-3">Plateforme de gestion des formations et inscriptions</p>
</div>

<!-- Quick Actions Cards -->
<div class="row g-4">
    <div class="col-md-6">
        <div class="card text-center h-100">
            <div class="card-body p-5">
                <i class="fas fa-book fa-4x text-primary mb-4"></i>
                <h3 class="card-title mb-3">Formations</h3>
                <p class="card-text text-muted mb-4">
                    Gérez et consultez toutes les formations disponibles
                </p>
                <a href="{{ route('formations.index') }}" class="btn btn-primary btn-lg">
                    <i class="fas fa-arrow-right"></i> Accéder aux Formations
                </a>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card text-center h-100">
            <div class="card-body p-5">
                <i class="fas fa-users fa-4x text-success mb-4"></i>
                <h3 class="card-title mb-3">Inscriptions</h3>
                <p class="card-text text-muted mb-4">
                    Gérez les inscriptions des étudiants aux formations
                </p>
                <a href="{{ route('inscriptions.index') }}" class="btn btn-success btn-lg">
                    <i class="fas fa-arrow-right"></i> Accéder aux Inscriptions
                </a>
            </div>
        </div>
    </div>
</div>

@endsection