@extends('layouts.app')

@section('content')
<div class="bg-gray-50 text-gray-800 font-sans text-sm">
    <header>
        <nav class="navbar navbar-expand-lg bg-white shadow-sm py-4 px-8">
            <a class="flex items-center text-lg font-medium mr-8" href="#">
               
                <span>Bienvenido</span>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto flex space-x-6 border-l pl-4">
                    <li class="nav-item active">
                        <a class="nav-link text-gray-700 hover:text-blue-600" href="#">Resumen</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-gray-700 hover:text-blue-600" href="#">Actividad</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-gray-700 hover:text-blue-600" href="#">Enviar & Solicitar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-gray-700 hover:text-blue-600" href="#">Wallet</a>
                    </li>
                </ul>
                <div class="flex space-x-4">
                    <button class="p-0 border-none bg-none">
                        <img src="./images/icon-settings.svg" alt="Settings Icon">
                    </button>
                    <button class="p-0 border-none bg-none">
                        <img src="./images/icon-notifications.svg" alt="Notifications Icon">
                    </button>
                </div>
            </div>
        </nav>
    </header>

    <main>
        <section class="bg-white border-b py-8">
            <div class="container mx-auto flex justify-between">
            <div class="flex items-center">
    
    <div>
        <h1 class="text-2xl font-normal mb-2">Hola, {{ $user->name }}!</h1>
    </div>
</div>
<button class="btn-transferencia" onclick="window.location.href='/transferir'">
    Realizar una transferencia
</button>



        </section>

        <!-- Información de saldo real -->
        <section class="py-8">
            <div class="container mx-auto">
                <div class="grid grid-cols-12 gap-8">
                    <div class="col-span-4">
                        <!-- Saldo real de la cuenta -->
                        <div class="bg-white shadow-sm rounded mb-8">
                            <div class="border-b p-6">
                                <div class="text-xs uppercase text-gray-500 mb-2">Saldo actual</div>
                                <h3 class="text-2xl font-light">${{ number_format($account->saldo, 2) }}</h3>
                                <a class="text-gray-500 hover:text-gray-600" href="#">Detalles →</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-span-8">
                        <!-- Movimientos recientes -->
                        <div class="bg-white shadow-sm rounded mb-8">
                            <div class="border-b p-6">
                                <h3 class="text-lg font-medium">Movimientos recientes</h3>
                                <a class="text-gray-500 hover:text-gray-600" href="#">Ver todos →</a>
                            </div>
                            <ul class="divide-y">
                                @forelse($account->movimientos as $movimiento)
                                    <li class="p-6 flex justify-between">
                                        <div>
                                            <span class="block text-2xl font-light">{{ $movimiento->created_at->format('d') }}</span>
                                            <span class="text-xs uppercase text-gray-500">{{ $movimiento->created_at->format('M') }}</span>
                                        </div>
                                        <div>
                                            <h4 class="font-medium">{{ $movimiento->descripcion }}</h4>
                                            <p class="text-gray-500 text-sm">{{ ucfirst($movimiento->tipo) }}</p>
                                        </div>
                                        <div class="text-right">
                                            <span class="{{ $movimiento->monto > 0 ? 'text-green-500' : 'text-red-500' }} font-medium">
                                                {{ $movimiento->monto > 0 ? '+' : '' }}{{ number_format($movimiento->monto, 2) }}
                                            </span>
                                        </div>
                                    </li>
                                @empty
                                    <li class="p-6">
                                        <p class="text-gray-500">No hay movimientos recientes.</p>
                                    </li>
                                @endforelse
                            </ul>
                        </div>

                        <!-- Tarjetas de la cuenta -->
                        <div class="bg-white shadow-sm rounded mb-8">
                            <div class="border-b p-6">
                                <h3 class="text-lg font-medium">Tus Tarjetas</h3>
                            </div>
                            <div class="p-6">
                                @forelse($account->cards as $card)
                                    <div class="border p-4 rounded mb-4">
                                        <div class="flex justify-between items-center">
                                            <div>
                                                <h4 class="font-medium">{{ ucfirst($card->tipo_tarjeta) }} Card</h4>
                                                <p class="text-gray-500">Expira: {{ $card->fecha_expiracion->format('m/Y') }}</p>
                                            </div>
                                            <div class="flex space-x-4">
    <button class="btn-primario" data-card-id="{{ $card->id }}" onclick="toggleCardNumber({{ $card->id }})">
        Mostrar
    </button>
    <button class="btn-secundario" onclick="copyToClipboard('card-{{ $card->id }}')">
        Copiar
    </button>
</div>

                                        </div>
                                        <p class="mt-4">
                                            <span id="card-{{ $card->id }}" class="hidden-card">**** **** **** {{ substr($card->numero_tarjeta, -4) }}</span>
                                        </p>
                                    </div>
                                @empty
                                    <p>No tienes tarjetas asociadas a esta cuenta.</p>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>

<script>
    function toggleCardNumber(cardId) {
        const cardNumberElement = document.getElementById(`card-${cardId}`);
        const button = document.querySelector(`button[data-card-id="${cardId}"]`);
        if (cardNumberElement.classList.contains('hidden-card')) {
            cardNumberElement.textContent = '{{ $card->numero_tarjeta }}'; // Muestra el número completo
            cardNumberElement.classList.remove('hidden-card');
            button.textContent = 'Ocultar';
        } else {
            cardNumberElement.textContent = '**** **** **** {{ substr($card->numero_tarjeta, -4) }}'; // Oculta el número
            cardNumberElement.classList.add('hidden-card');
            button.textContent = 'Mostrar';
        }
    }

    function copyToClipboard(elementId) {
        const textToCopy = document.getElementById(elementId).textContent;
        const textarea = document.createElement('textarea');
        textarea.value = textToCopy;
        document.body.appendChild(textarea);
        textarea.select();
        document.execCommand('copy');
        document.body.removeChild(textarea);
        alert('Número de tarjeta copiado al portapapeles');
    }
</script>

<style>
    .hidden-card {
        font-size: 1.2rem;
        font-family: 'Courier New', Courier, monospace;
        letter-spacing: 2px;
    }

    .show-hide-btn {
        background-color: #1a202c;
        color: white;
        padding: 5px 10px;
        border: none;
        cursor: pointer;
    }

    .copy-btn {
        background-color: #2b6cb0;
        color: white;
        padding: 5px 10px;
        border: none;
        cursor: pointer;
    }

    .show-hide-btn:hover,
    .copy-btn:hover {
        opacity: 0.8;
    }
    .btn-transferencia {
    font-family: 'Gotham Medium', sans-serif;
    font-size: 15px;
    color: #FFFFFF;
    background-color: #EB0029; 
    padding: 5px 10px; 
    border-radius: 4px;
    border: none;
    cursor: pointer;
    transition: background-color 0.3s;
    display: inline-block; 
}

.btn-transferencia:hover {
    background-color: #DB0026; /* Color de fondo al pasar el mouse */
}

    .btn-primario {
    font-family: 'Gotham Medium', sans-serif;
    font-size: 15px;
    color: #FFFFFF;
    background-color: #EB0029;
    padding: 10px 20px;
    border-radius: 4px;
    border: none;
    cursor: pointer;
    transition: background-color 0.3s;
}

.btn-primario:hover {
    background-color: #DB0026;
}
.btn-secundario {
    font-family: 'Gotham Medium', sans-serif;
    font-size: 15px; /* Ajusta el tamaño según sea necesario */
    color: #323E48;
    background-color: transparent;
    border: 2px solid #323E48;
    padding: 5px 10px;
    border-radius: 4px;
    cursor: pointer;
    transition: color 0.3s, background-color 0.3s, border-color 0.3s;
}

.btn-secundario:hover {
    color: #DB0026;
    border-color: #DB0026;
    background-color: transparent;
}

</style>
@endsection
