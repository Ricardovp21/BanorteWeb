@extends('layouts.app')

@section('content')
<div>
    <div class="flex h-screen items-center justify-center p-10">
        <div class="xl:w-1/2 w-full rounded border border-blue-800 md:shadow-xl">
            <div class="grid md:grid-cols-2 p-5">
                <div class="">
                    <img src="https://cdni.iconscout.com/illustration/premium/thumb/login-10299071-8333958.png?f=webp" alt="" />
                </div>
                <div class="flex items-center justify-center w-full">
                    <form action="" class="w-full">
                        <h1 class="text-center font-gothamBook uppercase text-redsito">User login</h1>
                        <br />
                        
                        <div class="relative mb-4 w-full">
                            <input type="email" 
                                class="peer w-full h-[50px] pl-5 pt-5 pb-2 bg-[#F6F6F6] border-b-2 border-[#323E48] text-[15px] text-[#323E48] font-gothamMedium focus:outline-none placeholder-transparent" 
                                placeholder=" " id="email" />
                            <label for="email" 
                                class="absolute left-5 top-[14px] text-[#323E48] text-[15px] font-gothamMedium transition-all peer-placeholder-shown:top-[14px] peer-placeholder-shown:text-[15px] peer-placeholder-shown:text-[#323E48] peer-focus:top-2 peer-focus:left-5 peer-focus:text-[12px] peer-focus:text-[#5B6670]">
                                Correo electrónico
                            </label>
                        </div>
                        
                        <div class="relative mb-4 w-full">
                            <input type="text" 
                                class="peer w-full h-[50px] pl-5 pt-5 pb-2 bg-[#F6F6F6] border-b-2 border-[#323E48] text-[15px] text-[#323E48] font-gothamMedium focus:outline-none placeholder-transparent" 
                                placeholder=" " id="card-number" pattern="[0-9]{16}" />
                            <label for="card-number" 
                                class="absolute left-5 top-[14px] text-[#323E48] text-[15px] font-gothamMedium transition-all peer-placeholder-shown:top-[14px] peer-placeholder-shown:text-[15px] peer-placeholder-shown:text-[#323E48] peer-focus:top-2 peer-focus:left-5 peer-focus:text-[12px] peer-focus:text-[#5B6670]">
                                Número de tarjeta
                            </label>
                        </div>

                        <div class="flex justify-between text-[#5B6670] text-[12px] font-gothamBook mt-1">
                            <span>Número de tarjeta</span>
                            <span>16 Dígitos</span>
                        </div>

                        <div id="error-message" class="hidden text-[#EB0029] text-[12px] mt-1">
                            El campo es obligatorio
                        </div>

                        <button type="submit" class="w-full rounded bg-redsito hover:bg-redsitoHov px-5 py-3 font-semibold text-white">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.querySelector('form').addEventListener('submit', function(event) {
        const emailField = document.getElementById('email');
        const cardNumberField = document.getElementById('card-number');
        const errorMessage = document.getElementById('error-message');

        if (!emailField.value || !cardNumberField.value.match(/[0-9]{16}/)) {
            event.preventDefault();
            errorMessage.classList.remove('hidden');
            emailField.classList.add('border-red-500');
            cardNumberField.classList.add('border-red-500');
        } else {
            errorMessage.classList.add('hidden');
            emailField.classList.remove('border-red-500');
            cardNumberField.classList.remove('border-red-500');
        }
    });
</script>
@endsection
