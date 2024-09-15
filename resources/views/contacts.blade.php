@extends('layouts.app')

@section('title', 'Mis Contactos')

@section('content')
<div class="flex justify-center items-center py-10">
    <div class="xl:w-3/4 w-full bg-white shadow-lg rounded-md p-6">
        <!-- Título -->
        <h1 class="text-center text-2xl font-bold uppercase text-redsito mb-6">Mis Contactos</h1>

        <!-- Lista de Contactos -->
        @if ($contacts && count($contacts) > 0)
            <div class="overflow-y-auto max-h-96">
                <ul class="divide-y divide-gray-300">
                    @foreach ($contacts as $contact)
                        <li class="py-4 flex justify-between items-center">
                            <div>
                                <p class="font-semibold text-gray-700">{{ $contact->nombre_contacto }}</p>
                                <p class="text-gray-500 text-sm">Número de Cuenta: {{ $contact->numero_cuenta }}</p>
                                <p class="text-gray-500 text-sm">Banco: {{ $contact->banco_contacto }}</p>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        @else
            <p class="text-center text-gray-600 mt-4">No tienes contactos agregados.</p>
        @endif

        <!-- Botón para Añadir Contacto -->
        <div class="mt-6 flex justify-center">
            <a href="{{ route('contacts.create') }}" class="bg-redsito hover:bg-redsitoHov text-white font-semibold py-2 px-6 rounded-md text-center transition duration-200 ease-in-out">
                Añadir Contacto
            </a>
        </div>
    </div>
</div>
@endsection
