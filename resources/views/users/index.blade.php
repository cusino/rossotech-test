@extends('layouts.app')

@section('content')
<div class="container">
    @if (Auth::check() && Auth::user()->hasRole('admin'))
        <a href="{{ route('countries.index') }}" class="btn btn-success">Visualizza Nazioni</a>
    @endif

    <h1>Lista Utenti</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Azioni</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <a href="{{ route('users.show', $user->id) }}" class="btn btn-info">Visualizza</a>
                        @if ((Auth::check() && Auth::id() === $user->id) || (Auth::check() && Auth::user()->hasRole('admin')))
                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-info">Modifica</a>
                        @endif
                        @if ((Auth::check() && Auth::id() != $user->id) && (Auth::check() && Auth::user()->hasRole('admin')))
                            <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Sei sicuro di voler eliminare questo utente?')">Elimina</button>
                        </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
