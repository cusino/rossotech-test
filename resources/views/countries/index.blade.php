@extends('layouts.app')

@section('content')
<div class="container">
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
                </tr>
            </thead>
            <tbody>
                @foreach($countries as $country)
                    <tr>
                        <td>{{ $country->id }}</td>
                        <td>{{ $country->name }}</td>
                        <td>{{ $country->iso_code }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
