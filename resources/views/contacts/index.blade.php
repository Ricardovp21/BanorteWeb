@extends('layouts.app')

@section('title', 'Mis Contactos')

@section('content')
    <h1>Mis Contactos</h1>

    <ul>
        @foreach ($contacts as $contact)
            <li>{{ $contact->nombre_contacto }} - {{ $contact->numero_cuenta }} ({{ $contact->banco_contacto }})</li>
        @endforeach
    </ul>

    <a href="{{ route('contacts.create') }}" class="btn btn-primary">Añadir Contacto</a>
@endsection
