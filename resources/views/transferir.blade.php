@extends('layouts.app')

@section('content')
<div class="flex h-screen items-center justify-center bg-gray-100 p-10">
    <div class="w-full max-w-xl rounded-lg bg-white shadow-xl p-8 border border-blue-800">
        <div class="text-left mb-8">
            <h1 class="font-gothamBook uppercase text-redsito text-3xl mb-4">Transferir dinero</h1>
            <p class="text-gray-600">Ingresa los detalles para completar tu transferencia</p>
        </div>

        <!-- Mensajes de éxito y error -->
        @if(session('success'))
            <div class="alert alert-success mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger mb-4">
                {{ session('error') }}
            </div>
        @endif

        <!-- Formulario de transferencia -->
        <form action="{{ route('transferir') }}" method="POST" class="grid grid-cols-1 gap-6">
            @csrf

            <!-- Campo Número de tarjeta -->
            <div class="relative">
                <label for="numero_tarjeta" class="block text-sm font-gothamMedium text-[#5B6670] mb-2">
                    Número de tarjeta
                </label>
                <input type="text" name="numero_tarjeta" id="numero_tarjeta" 
                       class="peer w-full h-12 pl-5 bg-gray-50 border-b-2 border-[#323E48] text-gray-700 rounded focus:outline-none focus:border-blue-500"
                       required maxlength="16" placeholder="Introduce 16 dígitos">
            </div>

            <!-- Campo Monto -->
            <div class="relative">
                <label for="monto" class="block text-sm font-gothamMedium text-[#5B6670] mb-2">
                    Monto a transferir
                </label>
                <input type="number" name="monto" id="monto" 
                       class="peer w-full h-12 pl-5 bg-gray-50 border-b-2 border-[#323E48] text-gray-700 rounded focus:outline-none focus:border-blue-500"
                       required placeholder="Ingresa el monto">
            </div>

            <!-- Botones -->
            <div class="flex justify-between mt-8">
                <button type="submit" class="w-1/2 rounded bg-redsito hover:bg-redsitoHov px-5 py-3 font-semibold text-white text-center transition-colors duration-300">
                    Transferir
                </button>
                <a href="{{ route('informacion') }}" class="w-1/2 ml-4 rounded bg-white border-2 border-[#323E48] hover:border-redsito hover:text-redsito px-5 py-3 font-semibold text-[#323E48] text-center transition-colors duration-300">
                    Cancelar
                </a>
            </div>
        </form>
    </div>
</div>

<style>
    .alert-success {
        background-color: #DFF0D8;
        color: #3C763D;
        padding: 10px;
        border-radius: 4px;
    }

    .alert-danger {
        background-color: #F2DEDE;
        color: #A94442;
        padding: 10px;
        border-radius: 4px;
    }
</style>

@endsection
