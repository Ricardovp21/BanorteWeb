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
                        <!-- Mensaje de error fuera del div del input -->
                        <div id="name-error" class="hidden text-[#EB0029] text-[12px] mb-4">
                            El campo de nombre es obligatorio
                        </div>

                        <!-- Campo Número de Teléfono -->
                        <div class="relative mb-4 w-full">
                            <input type="text" 
                                   class="peer w-full h-[50px] pl-5 pt-5 bg-[#F6F6F6] border-b-2 border-[#323E48] text-[15px] text-[#323E48] font-gothamMedium focus:outline-none placeholder-transparent" 
                                   id="phone" name="phone" maxlength="10"
                                   oninput="validatePhoneInput(); updatePhoneCounter(); updateLabelPosition(this)" />
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
@endsection
