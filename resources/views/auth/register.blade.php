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
                    <form id="register-form" action="{{ route('register.step1') }}" method="POST" class="w-full">
                        @csrf
                        <h1 class="text-center font-gothamBook uppercase text-redsito mb-6">Registro de usuario</h1>
                        
                        <!-- Campo Nombre -->
                        <div class="relative mb-4 w-full">
                            <input type="text" 
                                   class="peer w-full h-[50px] pl-5 pt-5 bg-[#F6F6F6] border-b-2 border-[#323E48] text-[15px] text-[#323E48] font-gothamMedium focus:outline-none placeholder-transparent" 
                                   id="name" name="name" 
                                   oninput="updateLabelPosition(this)"
                                   value="{{ old('name') }}" />
                            <label for="name" 
                                   class="absolute left-5 text-[#323E48] text-[15px] font-gothamMedium transition-all duration-200 origin-[0] transform"
                                   id="name-label" style="top: 50%; transform: translateY(-50%);">
                                   Nombre
                            </label>
                        </div>
                        <!-- Mensaje de error para nombre -->
                        <div id="name-error" class="hidden text-[#EB0029] text-[12px] mb-4">
                            El campo de nombre es obligatorio
                        </div>

                        <!-- Campo Número de Teléfono -->
                        <div class="relative mb-1 w-full">
                            <input type="text" pattern="[0-9]*" inputmode="numeric" 
                                   class="peer w-full h-[50px] pl-5 pt-5 bg-[#F6F6F6] border-b-2 border-[#323E48] text-[15px] text-[#323E48] font-gothamMedium focus:outline-none placeholder-transparent" 
                                   id="phone" name="phone" maxlength="10"
                                   oninput="updatePhoneCounter(); updateLabelPosition(this)" onkeypress="return isNumberKey(event)" />
                            <label for="phone" 
                                   class="absolute left-5 text-[#323E48] text-[15px] font-gothamMedium transition-all duration-200 origin-[0] transform"
                                   id="phone-label" style="top: 50%; transform: translateY(-50%);">
                                   Número de teléfono
                            </label>
                        </div>
                        <!-- Mensaje de error para teléfono -->
                        <div id="phone-error" class="hidden text-[#EB0029] text-[12px] mb-4">
                            El campo de teléfono es obligatorio
                        </div>
                        <!-- Contador de dígitos del número de teléfono -->
                        <div class="flex justify-between text-[#5B6670] text-[12px] mb-4" id="phone-counter-container">
                            <span>10 Dígitos</span>
                            <span id="phone-counter">0/10</span>
                        </div>

                        <!-- Campo Dirección -->
                        <div class="relative mb-4 w-full">
                            <input type="text" 
                                   class="peer w-full h-[50px] pl-5 pt-5 bg-[#F6F6F6] border-b-2 border-[#323E48] text-[15px] text-[#323E48] font-gothamMedium focus:outline-none placeholder-transparent" 
                                   id="address" name="address"
                                   value="{{ old('address') }}"
                                   oninput="updateLabelPosition(this)" />
                            <label for="address" 
                                   class="absolute left-5 text-[#323E48] text-[15px] font-gothamMedium transition-all duration-200 origin-[0] transform"
                                   id="address-label" style="top: 50%; transform: translateY(-50%);">
                                   Dirección
                            </label>
                        </div>
                        <!-- Mensaje de error para dirección -->
                        <div id="address-error" class="hidden text-[#EB0029] text-[12px] mb-4">
                            El campo de dirección es obligatorio
                        </div>

                        <!-- Botón "Siguiente" -->
                        <button type="submit" class="w-full rounded bg-redsito hover:bg-redsitoHov px-5 py-3 font-semibold text-white text-center block mb-6">
                            Siguiente
                        </button>
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

    // Actualiza el contador de dígitos del teléfono
    function updatePhoneCounter() {
        const phoneField = document.getElementById('phone');
        const phoneCounter = document.getElementById('phone-counter');
        phoneCounter.textContent = `${phoneField.value.length}/10`;
    }

    // Actualiza la posición de la etiqueta según el estado del input
    function updateLabelPosition(input) {
        const label = document.querySelector(`#${input.id}-label`);
        if (input.value) {
            label.style.top = '5px';
            label.style.transform = 'translateY(0)';
            label.style.fontSize = '12px';
            label.style.color = '#5B6670';
        } else {
            label.style.top = '50%';
            label.style.transform = 'translateY(-50%)';
            label.style.fontSize = '15px';
            label.style.color = '#323E48';
        }
    }

    // Validación de los campos
    document.querySelector('#register-form').addEventListener('submit', function(event) {
        event.preventDefault();  // Evita que el formulario se envíe directamente

        const nameField = document.getElementById('name');
        const phoneField = document.getElementById('phone');
        const addressField = document.getElementById('address');
        const nameError = document.getElementById('name-error');
        const phoneError = document.getElementById('phone-error');
        const addressError = document.getElementById('address-error');

        let isValid = true;

        // Validación del campo de nombre
        if (!nameField.value) {
            nameError.classList.remove('hidden');
            nameField.classList.add('border-red-500');
            isValid = false;
        } else {
            nameError.classList.add('hidden');
            nameField.classList.remove('border-red-500');
        }

        // Validación del campo de teléfono
        if (!phoneField.value || phoneField.value.length !== 10) {
            phoneError.classList.remove('hidden');
            phoneField.classList.add('border-red-500');
            document.getElementById('phone-counter-container').classList.add('hidden');
            isValid = false;
        } else {
            phoneError.classList.add('hidden');
            phoneField.classList.remove('border-red-500');
        }

        // Validación del campo de dirección
        if (!addressField.value) {
            addressError.classList.remove('hidden');
            addressField.classList.add('border-red-500');
            isValid = false;
        } else {
            addressError.classList.add('hidden');
            addressField.classList.remove('border-red-500');
        }

        // Si todos los campos son válidos, enviar el formulario
        if (isValid) {
            event.target.submit();
        }
    });
</script>
@endsection
