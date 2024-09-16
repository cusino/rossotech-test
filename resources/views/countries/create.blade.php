@extends('layouts.app') <!-- Estendi il layout principale -->

@section('content')
<div class="container">
    <h1>Inserisci una nuova Nazione</h1>

    <!-- Mostra eventuali messaggi di successo -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Form per l'inserimento di una nuova nazione -->
    <form action="{{ route('countries.store') }}" method="POST">
        @csrf <!-- Token di sicurezza per il form -->

        <div class="form-group">
            <label for="name">Nome Nazione</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" required>
            @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="iso_code">Codice ISO</label>
            <input type="text" id="iso_code" name="iso_code" class="form-control" value="{{ old('iso_code') }}" required>
            @error('iso_code')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Inserisci Nazione</button>
    </form>
</div>
@endsection
