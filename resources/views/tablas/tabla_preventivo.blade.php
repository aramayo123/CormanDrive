<div class="mx-auto text-center mt-[100px] mb-6">
    <p class="mb-6 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 xl:px-48 dark:text-gray-400">En esta
        seccion se encuentra disponible todo lo relacionado a PREVENTIVOS.</p>
    <a href="{{ url('/preventivo/crear') }}"
        class="w-full sm:w-[25%] py-2.5 px-5 me-2 mb-2 text-sm font-medium focus:outline-none rounded-lg border focus:z-10 focus:ring-4 focus:ring-gray-100 focus:ring-gray-700 bg-gray-800 text-gray-400 border-gray-600 hover:text-white hover:bg-gray-700 text-center">CREAR
        NUEVO PREVENTIVO</a>
</div>

<div class="mx-5 my-2">
    @if (count($preventivos))
        <div class="flex items-center flex-col sm:flex-row p-4 mb-4 rounded-lg bg-gray-800 text-green-400">
            <a href="" id="boton_editar_preventivo"
                class="w-full sm:w-[33%] py-2.5 px-5 me-2 mb-2 text-sm font-medium focus:outline-none rounded-lg border focus:z-10 focus:ring-4 focus:ring-gray-100 focus:ring-gray-700 bg-gray-800 text-gray-400 border-gray-600 hover:text-white hover:bg-gray-700 text-center">EDITAR</a>
            <form action="" onclick="EliminarPreventivo(this)" method="post" id="form_eliminar_preventivo"
                class="hover:cursor-pointer text-center w-full sm:w-[33%] py-2.5 px-5 me-2 mb-2 text-sm font-medium focus:outline-none rounded-lg border focus:z-10 focus:ring-4 focus:ring-gray-100 focus:ring-gray-700 bg-gray-800 text-gray-400 border-gray-600 hover:text-white hover:bg-gray-700">
                @csrf
                @method('delete')
                <button type="button" id="boton-borrar-preventivo" class="text-center mx-auto">BORRAR</button>
            </form>
            <a href="" id="boton_ver_preventivo"
                class="w-full sm:w-[33%] py-2.5 px-5 me-2 mb-2 text-sm font-medium focus:outline-none rounded-lg border focus:z-10 focus:ring-4 focus:ring-gray-100 focus:ring-gray-700 bg-gray-800 text-gray-400 border-gray-600 hover:text-white hover:bg-gray-700 text-center">VER</a>
        </div>
    @endif
</div>
<div class="mx-5 my-2">
    <div class="relative h-[420px] overflow-x-auto overflow-y-auto shadow-md sm:rounded-lg">
        @if (count($preventivos))
            <table class="w-full text-sm text-left rtl:text-right text-gray-400">
                <thead class="text-xs uppercase bg-gray-700 text-gray-400">
                    <tr>
                        <th scope="col" class="p-2">
                            <div class="flex items-center">
                                <input id="checkbox-all-search_10" type="radio" name="preventivo"
                                    onclick="EditarBorrarPreventivo(0)"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-600 ring-offset-gray-800 focus:ring-offset-gray-800 focus:ring-2 bg-gray-700 border-gray-600">
                                <label for="checkbox-all-search_10" class="sr-only">checkbox</label>
                            </div>
                        </th>
                        <th scope="col" class="px-3 py-3">
                            SUCURSAL
                        </th>
                        <th scope="col" class="px-3 py-3">
                            PERSONAL
                        </th>
                        <th scope="col" class="px-3 py-3">
                            FECHA
                        </th>
                        <th scope="col" class="px-3 py-3">
                            DRIVE
                        </th>
                        <th scope="col" class="px-3 py-3">
                            FOTOS
                        </th>
                        <th scope="col" class="px-3 py-3">
                            CERTIFICADO
                        </th>
                    </tr>
                </thead>
                <tbody id="tabla-preventivo">
                    @foreach ($preventivos as $preventivo)
                        <tr class="bg-gray-800 border-gray-700 hover:bg-gray-600">
                            <td class="w-4 p-2">
                                <div class="flex items-center">
                                    <input id="checkbox-table-search-{{ $preventivo->id }}" type="radio"
                                        name="preventivo" onclick="EditarBorrarPreventivo({{ $preventivo->id }})"
                                        class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-600 ring-offset-gray-800 focus:ring-offset-gray-800 focus:ring-2 bg-gray-700 border-gray-600">
                                    <label for="checkbox-table-search-{{ $preventivo->id }}"
                                        class="sr-only">checkbox</label>
                                </div>
                            </td>
                            <td class="px-3 py-4">
                                {{ $preventivo->sucursal }}
                            </td>
                            <td class="px-3 py-4">
                                <?php
                                $personal_preventivo = str_split($preventivo->personal_asignado);
                                if ($personal_preventivo[0] == '1') {
                                    echo '<p><span class="text-xs font-medium me-2 px-2.5 py-0.5 rounded text-green-300">' . $arr_personal[0] . '</span></p>';
                                }
                                if ($personal_preventivo[2] == '1') {
                                    echo '<p><span class="text-xs font-medium me-2 px-2.5 py-0.5 rounded text-green-300">' . $arr_personal[1] . '</span></p>';
                                }
                                if ($personal_preventivo[4] == '1') {
                                    echo '<p><span class="text-xs font-medium me-2 px-2.5 py-0.5 rounded text-green-300">' . $arr_personal[2] . '</span></p>';
                                }
                                if ($personal_preventivo[6] == '1') {
                                    echo '<p><span class="text-xs font-medium me-2 px-2.5 py-0.5 rounded text-green-300">' . $arr_personal[3] . '</span></p>';
                                }
                                if ($personal_preventivo[0] == '0' && $personal_preventivo[2] == '0' && $personal_preventivo[4] == '0' && $personal_preventivo[6] == '0') {
                                    echo '<p><span class="text-xs font-medium me-2 px-2.5 py-0.5 rounded text-green-300">S/P ASIGNADO</span></p>';
                                }
                                ?>
                            </td>
                            <td class="px-3 py-4">
                                {{ $preventivo->fecha }}
                            </td>
                            <td class="px-3 py-4">
                                <a href="{{ $preventivo->url_carpeta }}" target="_blank"
                                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-xs px-3 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">DRIVE</a>
                            </td>
                            <td class="px-3 py-4">
                                <form action="{{ url('/upload_f_preventivo') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="sucursal" id=""
                                        value="{{ $preventivo->sucursal }}">
                                    <input type="hidden" name="fecha" id=""
                                        value="{{ $preventivo->fecha }}">
                                    <button type="submit"
                                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-xs px-3 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Subir
                                        fotos</button>
                                </form>
                            </td>
                            <td class="px-3 py-4">
                                <?php $color = $preventivo->certificado ? 'green' : 'red'; ?>
                                <?php $palabra = $preventivo->certificado ? 'SI' : 'NO'; ?>
                                <p><span
                                        class="bg-<?php echo $color; ?>-700 text-<?php echo $color; ?>-300 text-sm font-medium me-2 py-0.5 rounded p-1">{{ $palabra }}</span>
                                </p>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <h1
                class="mb-4 text-center text-4xl font-extrabold leading-none tracking-tight text-gray-900 text-xl dark:text-white">
                NO EXISTEN PREVENTIVOS REALIZADOS.</h1>
            <h1
                class="mb-4 text-center text-4xl font-extrabold leading-none tracking-tight text-gray-900 text-xl dark:text-white">
                POR FAVOR REALIZA ALGUNO PARA VISUALIZAR LA TABLA DE PREVENTIVOS</h1>
        @endif
    </div>
</div>

<div class="flex flex-col items-center my-5">
    <!-- Help text -->
    <span class="text-sm text-gray-700 dark:text-gray-400">
        Mostrando <span class="font-semibold text-gray-900 dark:text-white" id="paginaActualPreventivo"></span> de <span
            class="font-semibold text-gray-900 dark:text-white" id="max_pag_preventivo"></span> página <span id="terminacion-preventivo"></span>
    </span>
    <div class="inline-flex mt-2 xs:mt-0">
        <!-- Buttons -->
        <button onclick="PaginaPrevPreventivo()"
            class="flex items-center justify-center px-4 h-10 text-base font-medium text-white bg-gray-800 rounded-s hover:bg-gray-900 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
            <svg class="w-3.5 h-3.5 me-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                fill="none" viewBox="0 0 14 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M13 5H1m0 0 4 4M1 5l4-4" />
            </svg>
            Prev
        </button>
        <button onclick="PaginaNextPreventivo()"
            class="flex items-center justify-center px-4 h-10 text-base font-medium text-white bg-gray-800 border-0 border-s border-gray-700 rounded-e hover:bg-gray-900 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
            Next
            <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                fill="none" viewBox="0 0 14 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M1 5h12m0 0L9 1m4 4L9 9" />
            </svg>
        </button>
    </div>
</div>
<script>
    function EliminarPreventivo(e) {
        if (!e.children[2].type == 'button')
            return

        const rutaBase = "{{ env('APP_URL') }}";
        if (e.action == rutaBase + '/')
            return


        e.children[2].setAttribute('type', 'button');

        Swal.fire({
            title: "Estas seguro?",
            text: "No podrás revertir esto.!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Si, eliminar!"
        }).then((result) => {
            if (result.isConfirmed) {
                e.children[2].setAttribute('type', 'submit');
                e.submit();
            }
        });
    }

    function EditarBorrarPreventivo(id) {
        var boton_editar = document.querySelector("#boton_editar_preventivo");
        var form_borrar = document.querySelector("#form_eliminar_preventivo");
        var boton_borrar = document.querySelector("#boton-borrar-preventivo");
        var boton_ver = document.querySelector("#boton_ver_preventivo");

        if (id == 0) {
            boton_editar.setAttribute('href', '')
            form_borrar.setAttribute('action', '')
            boton_borrar.setAttribute('type', 'button');
            boton_ver.setAttribute('href', '')
            return
        }

        var url = window.location + 'preventivo/editar/' + id;
        boton_editar.setAttribute('href', url)

        var url = window.location + 'preventivo/borrar/' + id;
        form_borrar.setAttribute('action', url)
        boton_borrar.setAttribute('type', 'submit');

        var url = window.location + 'preventivo/ver/' + id;
        boton_ver.setAttribute('href', url)
    }
    const max_registros_por_pag_preventivo = 5;
    var text_max_pag_preventivo = document.querySelector('#max_pag_preventivo');
    var arr_preventivo = <?php echo json_encode($preventivos); ?>;
    var max_pag_preventivo = Math.ceil(arr_preventivo.length/max_registros_por_pag_preventivo);
    var terminacion_preventivo = document.querySelector("#terminacion-preventivo");
    terminacion_preventivo.innerHTML = max_pag_preventivo == 1 ? "":"s";
    var TablaPreventivo = document.querySelector("#tabla-preventivo");
    var PagActualPreventivo = 0;
    TablaPreventivo.innerHTML = "";
    text_max_pag_preventivo.innerHTML = max_pag_preventivo;

    document.addEventListener('DOMContentLoaded', function() {
        RellenarPreventivos();
    });
    function PaginaNextPreventivo(){
        if(PagActualPreventivo < max_pag_preventivo-1)
            PagActualPreventivo++

        RellenarPreventivos()
    }
    function PaginaPrevPreventivo(){
        if(PagActualPreventivo > 0)
            PagActualPreventivo--

        RellenarPreventivos()
    }
    function RellenarPreventivos(){
        var min = (max_registros_por_pag_preventivo * PagActualPreventivo);
        var max = min + max_registros_por_pag_preventivo;
        var contador = min;
        var paginaActual = document.querySelector("#paginaActualPreventivo");
        paginaActual.innerHTML = (PagActualPreventivo+1);
        TablaPreventivo.innerHTML = "";
        for (var i = contador; i < max; i++) {
            if(i >= arr_preventivo.length)
                continue 

            var preventivo = arr_preventivo[i];
            if(contador >= min && contador <= max){
                var personal_asignado = preventivo.personal_asignado.split(" ");
                var array_personal =  ['DIEGO ARAMAYO', 'LUIS ARAMAYO', 'ALEJANDRO SAJAMA', 'CESAR ARAMAYO'];
                
                var color_2 = preventivo.certificado === '1' ? 'green' : 'red'
                var palabra = preventivo.certificado === '1' ? 'SI' : 'NO'
                
                TablaPreventivo.innerHTML += `
                    <tr class="bg-gray-800 border-gray-700 hover:bg-gray-600">
                        <td class="w-4 p-2">
                            <div class="flex items-center">
                                <input id="checkbox-table-search-${ preventivo.id }" type="radio"
                                    name="preventivo" onclick="EditarBorrarPreventivo(${ preventivo.id })"
                                    class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-600 ring-offset-gray-800 focus:ring-offset-gray-800 focus:ring-2 bg-gray-700 border-gray-600">
                                <label for="checkbox-table-search-${ preventivo.id }"
                                    class="sr-only">checkbox</label>
                            </div>
                        </td>
                        <td class="px-3 py-4">
                            ${ preventivo.sucursal }
                        </td>
                        <td class="px-3 py-4">
                            ${ (personal_asignado[0] === '1') ? '<p><span class=" text-green-300 text-xs font-medium me-2 px-2.5 py-0.5 rounded">'+array_personal[0]:"" }
                            ${ (personal_asignado[1] === '1') ? '<p><span class=" text-green-300 text-xs font-medium me-2 px-2.5 py-0.5 rounded">'+array_personal[1]:"" }
                            ${ (personal_asignado[2] === '1') ? '<p><span class=" text-green-300 text-xs font-medium me-2 px-2.5 py-0.5 rounded">'+array_personal[2]:"" }
                            ${ (personal_asignado[3] === '1') ? '<p><span class=" text-green-300 text-xs font-medium me-2 px-2.5 py-0.5 rounded">'+array_personal[3]:"" }
                            ${ (personal_asignado[0] !== '1' && personal_asignado[1] !== '1' && personal_asignado[2] !== '1' && personal_asignado[3] !== '1') ? '<p><span class=" text-green-300 text-xs font-medium me-2 px-2.5 py-0.5 rounded">S/P ASIGNADO</span></p>':""}
                        </td>
                        <td class="px-3 py-4">
                            ${ preventivo.fecha }
                        </td>
                        <td class="px-3 py-4">
                            <a href="${preventivo.url_carpeta}" target="_blank"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-xs px-3 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">DRIVE</a>
                        </td>
                        <td class="px-3 py-4">
                            <form action="{{ url('/upload_f_preventivo') }}" method="post">
                                @csrf
                                <input type="hidden" name="sucursal" id=""
                                    value="${preventivo.sucursal}">
                                <input type="hidden" name="fecha" id=""
                                    value="${preventivo.fecha}">
                                <button type="submit"
                                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-xs px-3 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Subir
                                    fotos</button>
                            </form>
                        </td>
                        <td class="px-3 py-4">
                            <p><span
                                class="bg-${color_2}-700 text-${color_2}-300 text-sm font-medium me-2 py-0.5 rounded p-1">${ palabra }</span>
                            </p>
                        </td>
                    </tr>
                `;
            }        
        }
    }
</script>
