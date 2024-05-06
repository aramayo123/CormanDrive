@php
    use App\Models\Ot;
    use App\Models\Preventivo;
    $remedits = Ot::orderByDesc('fecha_abierto')->get();
    $preventivos = Preventivo::orderByDesc('fecha')->get();

    $arr_personal = ['DIEGO ARAMAYO', 'LUIS ARAMAYO', 'ALEJANDRO SAJAMA', 'CESAR ARAMAYO'];
@endphp

@include('layouts.header')
<div class="bg-gray-900 p-3 sm:p-5 antialiased" style="min-height: 688px;">
    <div class="mx-auto text-center mt-2 mb-6">
        <div class="flex flex-col justify-items-center gap-5 justify-center">
            <img class="block sm:hidden mx-auto text-center" style="filter: brightness(1.1); mix-blend-mode: multiply;" src="{{ asset('/storage/img/corman_srl_logo.png') }}" alt="CORMAN" width="200" height="100">
            <h1
            class="mb-4 text-center text-4xl font-extrabold leading-none tracking-tight md:text-5xl lg:text-6xl text-white">
            CORMAN FALICITIES S.R.L</h1>
        </div>
        <p class="mb-6 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 xl:px-48 dark:text-gray-400">En esta seccion
            se encuentra disponible todo lo relacionado a OTs.</p>
        <a class="w-full sm:w-[25%] py-2.5 px-5 me-2 mb-2 text-sm font-medium focus:outline-none rounded-lg border focus:z-10 focus:ring-4 focus:ring-gray-100 focus:ring-gray-700 bg-gray-800 text-gray-400 border-gray-600 hover:text-white hover:bg-gray-700 text-center"
            href="{{ url('/ot/crear') }}">CREAR NUEVO OT</a>
    </div>
    <div class="mx-5 my-2">
        @if ($message = Session::get('exito'))
            <div id="alert-3" class="flex items-center p-4 mb-4 text-green-400 rounded-lg bg-gray-800" role="alert">
                <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                </svg>
                <span class="sr-only">Info</span>
                <div class="ml-3 text-sm font-medium">
                    <p>{{ $message }}</p>
                </div>
                <button type="button"
                    class="ml-auto -mx-1.5 -my-1.5 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 inline-flex items-center justify-center h-8 w-8 bg-gray-800 text-green-400 hover:bg-gray-700"
                    data-dismiss-target="#alert-3" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                </button>
            </div>
        @endif
    </div>
    @include('tablas.tabla_ot')
    @include('tablas.tabla_preventivo')
</div>


</body>
</html>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if (session('eliminar_preventivo') == 'ok')
    <script>
        Swal.fire({
            title: "Eliminado!",
            text: "Su PREVENTIVO ha sido eliminado con exito!.",
            icon: "success"
        });
    </script>
@endif
@if (session('eliminar_ot') == 'ok')
    <script>
        Swal.fire({
            title: "Eliminado!",
            text: "Su OT ha sido eliminado con exito!.",
            icon: "success"
        });
    </script>
@endif