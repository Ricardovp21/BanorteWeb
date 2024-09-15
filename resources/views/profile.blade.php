@extends('layouts.app')

@section('title', 'Mis Contactos')

@section('content')
<div class="flex h-screen items-center justify-center p-10">
    <div class="xl:w-3/4 w-full rounded border border-blue-800 shadow-lg">
        <div class="grid md:grid-cols-2 p-6 gap-6">
            <!-- Columna izquierda: Información general -->
            <div class="p-5 bg-white shadow-md rounded-md">
                <h1 class="text-center font-gothamBook uppercase text-redsito mb-6">Mis Contactos</h1>

                <!-- Lista de Contactos -->
                @if ($contacts && count($contacts) > 0)
                    <div class="overflow-y-auto max-h-96">
                        <ul class="divide-y divide-gray-200">
                            @foreach ($contacts as $contact)
                                <li class="py-3">
                                    <p class="font-semibold text-gray-700">{{ $contact->nombre_contacto }}</p>
                                    <p class="text-gray-500 text-sm">Número de Cuenta: {{ $contact->numero_cuenta }}</p>
                                    <p class="text-gray-500 text-sm">Banco: {{ $contact->banco_contacto }}</p>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @else
                    <p class="text-center text-gray-600">No tienes contactos agregados.</p>
                @endif
            </div>

            <!-- Columna derecha: Añadir Contacto -->
            <div class="p-5 bg-white shadow-md rounded-md">
                <h2 class="text-lg font-bold text-gray-700 mb-3">Añadir Nuevo Contacto</h2>

                <!-- Marcador de posición para añadir contacto -->
                <p class="text-gray-600">
                    Aquí puedes añadir un nuevo contacto a tu lista.
                </p>

                <!-- Botón para Añadir Contacto -->
                <div class="mt-6 flex justify-center">
                    <a href="{{ route('contacts.create') }}" class="bg-redsito hover:bg-redsitoHov text-white font-semibold py-2 px-6 rounded-md text-center transition duration-200 ease-in-out">
                        Añadir Contacto
                    </a>
                </div>

                <!-- Ejemplo de formulario para añadir contacto en el futuro -->
                <div class="mt-4 bg-gray-100 p-4 rounded-md">
                    <p class="text-gray-500 text-sm">Formulario para añadir un contacto estará disponible pronto.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
