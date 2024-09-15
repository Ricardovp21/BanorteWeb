<nav class="bg-[#eb0029] relative border-gray-200 py-2.5 font-gotham" style="background-image: url('{{ asset('img/navigation.png') }}'); background-repeat: repeat-x; background-position: center top; background-size: auto 100%;">
    <div class="flex items-center justify-between max-w-screen-xl px-4 mx-auto">
        <!-- Logo -->
        <a href="{{ route('home') }}" class="logo" style="background-image: url('https://www.banorte.com/cms/banorte/imagenes/logo_circulo_pyme.png'); p-0 m-0 display: block; height: 60px; width: 290px; background-size: 280px 85px; background-repeat: no-repeat; background-position: center center;">
            <span style="opacity:0!important;">Página inicio</span>
        </a>

        <!-- Menú principal (visible en pantallas grandes) -->
        <div class="hidden lg:flex space-x-8 ml-10">
            <ul class="flex space-x-8">
                <li><a href="{{ route('home') }}" class="text-white hover:text-gray-200 bg-transparent font-medium rounded-lg text-[15px] px-4 py-2">Home</a></li>

            </ul>
        </div>

        <a href="{{ auth()->check() ? route('informacion') : route('login') }}" class="text-white bg-redsito hover:bg-redsitoHov focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-[15px] px-4 lg:px-[45px] py-[30px] lg:py-2.5 focus:outline-none ml-auto">
            {{ auth()->check() ? 'Ir a Información' : 'Login' }}
        </a>


        <!-- Botón de menú móvil (hamburguesa) -->
        <button id="menu-toggle" class="lg:hidden inline-flex items-center p-2 ml-1 text-[15px] text-gray-500 rounded-lg hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200">
            <span class="sr-only">Open main menu</span>
            <svg id="menu-open" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
            </svg>
            <svg id="menu-close" class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
            </svg>
        </button>
    </div>

    <!-- Menú móvil desplegable -->
    <div id="mobile-menu" class="hidden lg:hidden">
        <ul class="flex flex-col items-center space-y-4 py-4">
            <li><a href="{{ route('home') }}" class="text-white hover:text-gray-200 bg-transparent font-medium rounded-lg text-[15px] px-4 py-2">Home</a></li>

        </ul>
    </div>
</nav>

<script>
    // Controlar el despliegue del menú móvil
    document.getElementById('menu-toggle').addEventListener('click', function() {
        const menu = document.getElementById('mobile-menu');
        const openIcon = document.getElementById('menu-open');
        const closeIcon = document.getElementById('menu-close');

        if (menu.classList.contains('hidden')) {
            menu.classList.remove('hidden');
            openIcon.classList.add('hidden');
            closeIcon.classList.remove('hidden');
        } else {
            menu.classList.add('hidden');
            openIcon.classList.remove('hidden');
            closeIcon.classList.add('hidden');
        }
    });
</script>