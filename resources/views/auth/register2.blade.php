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
                    <form id="register-step2" method="POST" class="w-full">
                        @csrf
                        <h1 class="text-center font-gothamBook uppercase text-redsito mb-6">Registro - Paso 2</h1>
                        
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
                        <!-- Mensaje de error para correo -->
                        <div id="email-error" class="hidden text-[#EB0029] text-[12px] mb-4">
                            El campo de correo es obligatorio
                        </div>

                        <!-- Campo Contraseña -->
                        <div class="relative mb-4 w-full">
                            <input type="password" 
                                   class="peer w-full h-[50px] pl-5 pt-5 bg-[#F6F6F6] border-b-2 border-[#323E48] text-[15px] text-[#323E48] font-gothamMedium focus:outline-none placeholder-transparent" 
                                   id="password" name="password"
                                   oninput="updateLabelPosition(this)" />
                            <label for="password" 
                                   class="absolute left-5 text-[#323E48] text-[15px] font-gothamMedium transition-all duration-200 origin-[0] transform"
                                   id="password-label" style="top: 50%; transform: translateY(-50%);">
                                   Contraseña
                            </label>
                        </div>
                        <!-- Mensaje de error para contraseña -->
                        <div id="password-error" class="hidden text-[#EB0029] text-[12px] mb-4">
                            El campo de contraseña es obligatorio
                        </div>

                        <!-- Campo Confirmar Contraseña -->
                        <div class="relative mb-4 w-full">
                            <input type="password" 
                                   class="peer w-full h-[50px] pl-5 pt-5 bg-[#F6F6F6] border-b-2 border-[#323E48] text-[15px] text-[#323E48] font-gothamMedium focus:outline-none placeholder-transparent" 
                                   id="password_confirmation" name="password_confirmation"
                                   oninput="updateLabelPosition(this)" />
                            <label for="password_confirmation" 
                                   class="absolute left-5 text-[#323E48] text-[15px] font-gothamMedium transition-all duration-200 origin-[0] transform"
                                   id="password-confirm-label" style="top: 50%; transform: translateY(-50%);">
                                   Confirmar Contraseña
                            </label>
                        </div>
                        <!-- Mensaje de error para confirmación de contraseña -->
                        <div id="password-confirm-error" class="hidden text-[#EB0029] text-[12px] mb-4">
                            Debe confirmar su contraseña
                        </div>

                        <!-- Botón "Finalizar Registro" -->
                        <button type="submit" class="w-full rounded bg-redsito hover:bg-redsitoHov px-5 py-3 font-semibold text-white text-center block mb-6">Finalizar Registro</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
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

    // Validación del formulario
    document.querySelector('#register-step2').addEventListener('submit', function(event) {
        event.preventDefault();
        
        const emailField = document.getElementById('email');
        const passwordField = document.getElementById('password');
        const passwordConfirmField = document.getElementById('password_confirmation');
        const emailError = document.getElementById('email-error');
        const passwordError = document.getElementById('password-error');
        const passwordConfirmError = document.getElementById('password-confirm-error');

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

        // Validación del campo de contraseña
        if (!passwordField.value) {
            passwordError.classList.remove('hidden');
            passwordField.classList.add('border-red-500');
            isValid = false;
        } else {
            passwordError.classList.add('hidden');
            passwordField.classList.remove('border-red-500');
        }

        // Validación del campo de confirmación de contraseña
        if (!passwordConfirmField.value || passwordConfirmField.value !== passwordField.value) {
            passwordConfirmError.classList.remove('hidden');
            passwordConfirmField.classList.add('border-red-500');
            isValid = false;
        } else {
            passwordConfirmError.classList.add('hidden');
            passwordConfirmField.classList.remove('border-red-500');
        }

        if (isValid) {
            event.target.submit();
        }
    });
</script>
@endsection