<nav class="bg-[#eb0029] relative border-gray-200 py-2.5 font-gotham">
    <div class="flex items-center justify-between max-w-screen-xl px-4 mx-auto relative">
    
        <a href="/wps/portal/empresas/Home/circulo-pyme" class="logo" style="background-image: url(&quot;https://www.banorte.com/cms/banorte/imagenes/logo_circulo_pyme.png&quot;); p-0  m-0 display: block; height: 60; width: 290px; background-size: 280px 85px; background-repeat: no-repeat; background-position: center center;"><span style="opacity:0!important;">Pagina inicio</span></a>

        <ul class="flex space-x-8 ml-10">
            <li>
                <a href="{{ route('home') }}" class="text-white hover:text-gray-200 bg-transparent font-medium rounded-lg text-[15px] px-4 py-2">Home</a>
            </li>
            <li>
                <a href="#" class="text-white hover:text-gray-200 bg-transparent font-medium rounded-lg text-[15px] px-4 py-2">Company</a>
            </li>
            <li>
                <a href="#" class="text-white hover:text-gray-200 bg-transparent font-medium rounded-lg text-[15px] px-4 py-2">Marketplace</a>
            </li>
            <li>
                <a href="#" class="text-white hover:text-gray-200 bg-transparent font-medium rounded-lg text-[15px] px-4 py-2">Features</a>
            </li>
            <li>
                <a href="#" class="text-white hover:text-gray-200 bg-transparent font-medium rounded-lg text-[15px] px-4 py-2">Team</a>
            </li>
            <li>
                <a href="#" class="text-white hover:text-gray-200 bg-transparent font-medium rounded-lg text-[15px] px-4 py-2">Contact</a>
            </li>
        </ul>

        <!-- Botón de Login -->
        <a href="{{ route('login') }}"
        class="text-white bg-redsito hover:bg-redsitoHov focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-[15px] px-4 lg:px-[45px] py-[30px] lg:py-2.5 focus:outline-none ml-auto">Login</a>

        <!-- Botón de menú móvil -->
        <button data-collapse-toggle="mobile-menu-2" type="button"
                class="inline-flex items-center p-2 ml-1 text-[15px] text-gray-500 rounded-lg lg:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200"
                aria-controls="mobile-menu-2" aria-expanded="true">
            <span class="sr-only">Open main menu</span>
            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                    clip-rule="evenodd"></path>
            </svg>
            <svg class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                    clip-rule="evenodd"></path>
            </svg>
        </button>
    </div>
</nav>

<script src="https://unpkg.com/flowbite@1.4.1/dist/flowbite.js"></script>
