@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Profilo di {{ $user->name }}</h1>
    <ul>
        <li><strong>Nome:</strong> {{ $user->name }}</li>
        <li><strong>Email:</strong> {{ $user->email }}</li>
        <li><strong>Creato il:</strong> {{ $user->created_at->format('d-m-Y H:i') }}</li>
    </ul>
    <a href="{{ route('users.index') }}" class="btn btn-secondary">Torna alla lista</a>
</div>
@endsection
