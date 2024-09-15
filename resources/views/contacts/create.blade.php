@extends('layouts.app')

@section('title', 'Añadir Contacto')

@section('content')
    <h1>Añadir Nuevo Contacto</h1>

    <form action="{{ route('contacts.store') }}" method="POST">
        @csrf
        <div>
            <label for="nombre_contacto">Nombre del Contacto:</label>
            <input type="text" id="nombre_contacto" name="nombre_contacto" required>
        </div>
        <div>
            <label for="numero_cuenta">Número de Cuenta:</label>
            <input type="text" id="numero_cuenta" name="numero_cuenta" required>
        </div>
        <div>
            <label for="banco_contacto">Banco:</label>
            <input type="text" id="banco_contacto" name="banco_contacto" required>
        </div>
        <button type="submit" class="btn btn-primary">Guardar Contacto</button>
    </form>
@endsection
