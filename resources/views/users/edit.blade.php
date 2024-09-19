@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Modifica Utente</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Dettagli utente -->
        <div class="form-group">
            <label for="name">Nome</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $user->name) }}" required>
        </div>

        <div class="form-group">
            <label for="surname">Cognome</label>
            <input type="text" class="form-control" id="surname" name="surname" value="{{ old('surname', $user->userMeta->surname) }}" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $user->email) }}" required>
        </div>

        <div class="form-group">
            <label for="country_id">Nazione</label>
            <select id="country_id" name="country_id" class="form-control">
                @foreach($countries as $country)
                    <option value="{{ $country->id }}" {{ old('country_id', $user->country_id) == $country->id ? 'selected' : '' }}>
                        {{ $country->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Dati aggiuntivi -->
        <h3>Informazioni Aggiuntive</h3>

        <div class="form-group">
            <label for="address">Indirizzo</label>
            <input type="text" class="form-control" id="address" name="address" value="{{ old('address', $user->userMeta->address ?? '') }}">
        </div>

        <div class="form-group">
            <label for="postal_code">CAP</label>
            <input type="text" class="form-control" id="postal_code" name="postal_code" value="{{ old('postal_code', $user->userMeta->postal_code ?? '') }}">
        </div>

        <div class="form-group">
            <label for="city">Città</label>
            <input type="text" class="form-control" id="city" name="city" value="{{ old('city', $user->userMeta->city ?? '') }}">
        </div>

        <div class="form-group">
            <label for="province">Provincia</label>
            <input type="text" class="form-control" id="province" name="province" value="{{ old('province', $user->userMeta->province ?? '') }}">
        </div>

        <button type="submit" class="btn btn-primary">Salva modifiche</button>
    </form>

    <!-- Aggiungi link per tornare alla vista dell'utente -->
    <a href="{{ route('users.show', $user->id) }}" class="btn btn-secondary mt-3">Torna ai dettagli dell'utente</a>
</div>
@endsection
