<!-- resources/views/countries/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Modifica Nazione</h1>

        <!-- Mostra messaggi di errore -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('countries.update', $country->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Nome</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $country->name) }}" required>
            </div>

            <div class="form-group">
                <label for="iso_code">ISO Code</label>
                <input type="text" class="form-control" id="iso_code" name="iso_code" value="{{ old('iso_code', $country->iso_code) }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Salva</button>
        </form>
    </div>
@endsection
