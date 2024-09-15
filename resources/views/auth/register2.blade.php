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
                    <!-- Cambié la acción del formulario a la ruta principal -->
                    <form id="register-step2" action="{{ route('home') }}" method="POST" class="w-full">
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

                        <!-- Confirmación de Contraseña -->
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

                        <!-- Botón "Finalizar Registro" -->
                        <button type="submit"  class="w-full rounded bg-redsito hover:bg-redsitoHov px-5 py-3 font-semibold text-white text-center block mb-6">
                            Finalizar Registro
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
