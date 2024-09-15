@extends('layouts.app')

@section('content')
<div>
    <div class="flex h-screen items-center justify-center p-10">
        <div class="xl:w-1/2 w-full rounded border border-blue-800 md:shadow-xl">
            <div class="grid md:grid-cols-2 p-5">
                <div class="flex items-center justify-center">
                    <img src="{{ asset('img/Logo.png') }}" alt="" class="max-w-full h-auto" />
                </div>
                <div class="flex items-center justify-center w-full">
                    <form id="login-form" action="{{ route('login') }}" method="POST" class="w-full">
                        @csrf
                        <h1 class="text-center font-gothamBook uppercase text-redsito mb-6">User login</h1>
                        
                        <!-- Campo Correo Electrónico -->
                        <div class="relative mb-4 w-full">
                            <input type="email" 
                                   class="peer w-full h-[50px] pl-5 pt-5 bg-[#F6F6F6] border-b-2 border-[#323E48] text-[15px] text-[#323E48] font-gothamMedium focus:outline-none placeholder-transparent" 
                                   id="email" name="email" 
                                   oninput="updateLabelPosition(this)"
                                   value="{{ old('email') }}" />
                            <label for="email" 
                                   class="absolute left-5 text-[#323E48] text-[15px] font-gothamMedium transition-all duration-200 origin-[0] transform"
                                   id="email-label" style="top: 50%; transform: translateY(-50%);">
                                   Correo electrónico
                            </label>
                        </div>
                        <!-- Mensaje de error fuera del div del input -->
                        <div id="email-error" class="hidden text-[#EB0029] text-[12px] mb-4">
                            El campo de correo es obligatorio
                        </div>

                        <!-- Campo Número de Tarjeta -->
                        <div class="relative mb-1 w-full">
                            <input type="text" pattern="[0-9]*" inputmode="numeric" 
                                   class="peer w-full h-[50px] pl-5 pt-5 bg-[#F6F6F6] border-b-2 border-[#323E48] text-[15px] text-[#323E48] font-gothamMedium focus:outline-none placeholder-transparent" 
                                   id="card-number" name="card_number" maxlength="16"
                                   oninput="updateCardCounter(); updateLabelPosition(this)" onkeypress="return isNumberKey(event)" />
                            <label for="card-number" 
                                   class="absolute left-5 text-[#323E48] text-[15px] font-gothamMedium transition-all duration-200 origin-[0] transform"
                                   id="card-number-label" style="top: 50%; transform: translateY(-50%);">
                                   Número de tarjeta
                            </label>
                        </div>
                        <!-- Mensaje de error fuera del div del input -->
                        <div id="card-error" class="hidden text-[#EB0029] text-[12px] mb-4">
                            El campo de número de tarjeta es obligatorio
                        </div>

                        <!-- Contador de dígitos siempre visible mientras se escribe -->
                        <div class="flex justify-between text-[#5B6670] text-[12px] mb-4" id="digit-counter-container">
                            <span>16 Dígitos</span>
                            <span id="card-counter">0/16</span>
                        </div>

                        <!-- Enlace de Login -->
                        <a href="javascript:void(0)" onclick="submitLoginForm()" class="w-full rounded bg-redsito hover:bg-redsitoHov px-5 py-3 font-semibold text-white text-center block mb-6">Login</a>
                        
                        <div class="flex justify-center items-center my-6">
                            <div class="w-full h-[1px] bg-gray-300"></div>
                            <span class="px-4 text-gray-500">o</span>
                            <div class="w-full h-[1px] bg-gray-300"></div>
                        </div>

                        <a href="{{ route('register') }}" class="w-full rounded bg-white border-2 border-[#323E48] hover:border-redsito hover:text-redsito px-5 py-3 font-semibold text-[#323E48] text-center block">Registro</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Bloquear la entrada de letras, solo permitir números
    function isNumberKey(evt) {
        var charCode = evt.which ? evt.which : evt.keyCode;
        if (charCode > 31 && (charCode < 48 || charCode > 57)) {
            return false;
        }
        return true;
    }

    // Actualiza el contador de dígitos mientras se escribe
    function updateCardCounter() {
        const cardNumberField = document.getElementById('card-number');
        const cardCounter = document.getElementById('card-counter');
        const digitCounterContainer = document.getElementById('digit-counter-container');
        
        // Mostrar el contador solo cuando el campo tiene texto
        if (cardNumberField.value.length > 0) {
            digitCounterContainer.classList.remove('hidden');
            cardCounter.textContent = `${cardNumberField.value.length}/16`;
        }
    }

    // Actualiza la posición de la etiqueta según el estado del input
    function updateLabelPosition(input) {
        const label = document.querySelector(`#${input.id}-label`);
        
        // Si el input tiene valor, el label se mueve hacia arriba
        if (input.value) {
            label.style.top = '5px';
            label.style.transform = 'translateY(0)';
            label.style.fontSize = '12px';
            label.style.color = '#5B6670';
        } else {
            // Si está vacío, vuelve al centro
            label.style.top = '50%';
            label.style.transform = 'translateY(-50%)';
            label.style.fontSize = '15px';
            label.style.color = '#323E48';
        }
    }

    // Al cargar la página, se asegura de que los labels estén en la posición correcta si ya hay valores en los inputs
    document.addEventListener('DOMContentLoaded', function() {
        const inputs = document.querySelectorAll('input');
        inputs.forEach(input => {
            updateLabelPosition(input);  // Mantiene el label arriba si hay texto
        });
    });

    // Validación del formulario
    function submitLoginForm() {
        const emailField = document.getElementById('email');
        const cardNumberField = document.getElementById('card-number');
        const emailError = document.getElementById('email-error');
        const cardError = document.getElementById('card-error');
        const digitCounterContainer = document.getElementById('digit-counter-container');

        let isValid = true;

        // Validación del campo de correo
        if (!emailField.value) {
            emailError.classList.remove('hidden');
            emailField.classList.add('border-red-500');
            isValid = false;
        } else {
            emailError.classList.add('hidden');
            emailField.classList.remove('border-red-500');
        }

        // Validación del campo de número de tarjeta
        if (!cardNumberField.value) {
            cardError.classList.remove('hidden');
            cardNumberField.classList.add('border-red-500');
            digitCounterContainer.classList.add('hidden'); // Ocultar contador si no hay texto
            isValid = false;
        } else if (cardNumberField.value.length !== 16) {
            cardError.classList.remove('hidden');
            cardNumberField.classList.add('border-red-500');
            isValid = false;
        } else {
            cardError.classList.add('hidden');
            cardNumberField.classList.remove('border-red-500');
        }

        if (isValid) {
            document.getElementById('login-form').submit(); // Envía el formulario si es válido
        }
    }
</script>
@endsection
