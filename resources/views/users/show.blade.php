@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Dettagli Utente</h1>

    <div class="card">
        <div class="card-header">
            <h2>{{ $user->name }} {{ $user->surname }}</h2>
        </div>
        <div class="card-body">
            <p><strong>ID:</strong> {{ $user->id }}</p>
            <p><strong>Nome:</strong> {{ $user->name }}</p>
            <p><strong>Cognome:</strong> {{ $user->surname }}</p>
            <p><strong>Email:</strong> {{ $user->email }}</p>
            <p><strong>Nazione:</strong> {{ $user->country->name ?? 'N/A' }}</p>
            
            <h3>Informazioni Aggiuntive</h3>
            <p><strong>Indirizzo:</strong> {{ $user->userMeta->address ?? 'N/A' }}</p>
            <p><strong>Città:</strong> {{ $user->userMeta->city ?? 'N/A' }}</p>
            <p><strong>CAP:</strong> {{ $user->userMeta->postal_code ?? 'N/A' }}</p>
            <p><strong>Provincia:</strong> {{ $user->userMeta->province ?? 'N/A' }}</p>
        </div>
    </div>

    <!-- Aggiungi link per tornare alla lista degli utenti -->
    <a href="{{ route('users.index') }}" class="btn btn-primary mt-3">Torna alla lista degli utenti</a>
</div>
@endsection
