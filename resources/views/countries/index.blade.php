@extends('layouts.app')

@section('content')
<div class="container">
<a href="{{ route('countries.create') }}" class="btn btn-success">Aggiungi Nuova Nazione</a>
    <h1>Lista delle Nazioni</h1>

    @if($countries->isEmpty())
        <p>Nessuna nazione trovata.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Codice ISO</th>
                    <th>Azione</th>
                </tr>
            </thead>
            <tbody>
                @foreach($countries as $country)
                    <tr>
                        <td>{{ $country->id }}</td>
                        <td>{{ $country->name }}</td>
                        <td>{{ $country->iso_code }}</td>
                        <td>
                            <a href="{{ route('countries.edit', $country->id) }}" class="btn btn-primary">Modifica</a>
                            <form action="{{ route('countries.destroy', $country->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Sei sicuro di voler eliminare questa nazione?')">Elimina</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
