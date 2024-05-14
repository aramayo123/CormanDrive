<div class="mx-5 my-2">
    @if (count($remedits))
        <div class="flex items-center flex-col sm:flex-row p-4 mb-4 rounded-lg bg-gray-800 text-green-400">
            <a href="" id="boton_editar_ot"
                class="w-full sm:w-[20%] py-2.5 px-5 me-2 mb-2 text-sm font-medium focus:outline-none rounded-lg border focus:z-10 focus:ring-4 focus:ring-gray-100 focus:ring-gray-700 bg-gray-800 text-gray-400 border-gray-600 hover:text-white hover:bg-gray-700 text-center">EDITAR</a>
            <form action="" method="post" onclick="EliminarOt(this)" id="form_eliminar_ot"
                class="hover:cursor-pointer text-center w-full sm:w-[20%] py-2.5 px-5 me-2 mb-2 text-sm font-medium focus:outline-none rounded-lg border focus:z-10 focus:ring-4 focus:ring-gray-100 focus:ring-gray-700 bg-gray-800 text-gray-400 border-gray-600 hover:text-white hover:bg-gray-700">
                @csrf
                @method('delete')
                <button type="button" id="boton-borrar-ot" class="text-center mx-auto">BORRAR</button>
            </form>
            <a href="" id="boton_ver_ot"
                class="w-full sm:w-[20%] py-2.5 px-5 me-2 mb-2 text-sm font-medium focus:outline-none rounded-lg border focus:z-10 focus:ring-4 focus:ring-gray-100 focus:ring-gray-700 bg-gray-800 text-gray-400 border-gray-600 hover:text-white hover:bg-gray-700 text-center">VER</a>
            <div class="mx-auto w-full sm:w-[40%]">   
                <label for="buscar_remedit" class="mb-2 text-sm font-medium sr-only text-white">Search</label>
                <div class="relative">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                        </svg>
                    </div>
                    <input type="search" id="buscar_remedit" class="block w-full p-4 ps-10 text-sm border rounded-lg bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500" placeholder="Buscar remedi..." required />
                    <button type="button" id="boton_buscar" class="text-white absolute end-2.5 bottom-2.5 focus:ring-4 focus:outline-none font-medium rounded-lg text-sm px-4 py-2 bg-blue-600 hover:bg-blue-700 focus:ring-blue-800">Buscar</button>
                </div>
            </div>
        </div>
    @endif
</div>
<div class="mx-5 my-2">
    <div class="relative h-[450px] overflow-x-auto overflow-y-auto shadow-md sm:rounded-lg">
        @if (count($remedits))
            <table class="w-full text-sm text-left rtl:text-right text-gray-400">
                <thead class="text-xs uppercase bg-gray-700 text-gray-400">
                    <tr>
                        <th scope="col" class="p-2">
                            <div class="flex items-center">
                                <input id="checkbox-all-search_1" type="radio" name="remedit"
                                    onclick="EditarBorrarOt(0)"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-600 ring-offset-gray-800 focus:ring-offset-gray-800 focus:ring-2 bg-gray-700 border-gray-600">
                                <label for="checkbox-all-search_1" class="sr-only">checkbox</label>
                            </div>
                        </th>
                        <th scope="col" class="px-3 py-3" style="width:15px !important;">
                            REMEDIT
                        </th>
                        <th scope="col" class="px-3 py-3">
                            SUCURSAL
                        </th>
                        <th scope="col" class="px-3 py-3">
                            PERSONAL
                        </th>
                        <th scope="col" class="px-3 py-3">
                            ABIERTO
                        </th>
                        <th scope="col" class="px-3 py-3">
                            CERRADO
                        </th>
                        <th scope="col" class="px-3 py-3">
                            DRIVE
                        </th>
                        <th scope="col" class="px-3 py-3">
                            ESTADO
                        </th>
                        <th scope="col" class="px-3 py-3">
                            FOTOS
                        </th>
                        <th scope="col" class="px-3 py-3">
                            CERTIFICADO
                        </th>
                    </tr>
                </thead>
                <tbody id="tabla-ot">
                    @foreach ($remedits as $remedit)
                        <tr class="bg-gray-800 border-gray-700 hover:bg-gray-600">
                            <td class="w-4 p-2">
                                <div class="flex items-center">
                                    <input id="{{ $remedit->id }}_{{ $remedit->id }}" type="radio"
                                        name="remedit" onclick="EditarBorrarOt({{ $remedit->id }})"
                                        class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-600 ring-offset-gray-800 focus:ring-offset-gray-800 focus:ring-2 bg-gray-700 border-gray-600">
                                    <label for="{{ $remedit->id }}_{{ $remedit->id }}"
                                        class="sr-only">checkbox</label>
                                </div>
                            </td>
                            <th scope="row" class="px-3 py-4 font-medium whitespace-nowrap text-white">
                                {{ $remedit->remedit }}
                            </th>
                            <td class="px-3 py-4">
                                {{ $remedit->sucursal }}
                            </td>
                            <td class="px-3 py-4">
                                <?php
                                $personal_remedit = explode(" ", $remedit->personal_asignado);
                                $cantidad = 0;
                                $connnnt = 0;
                                foreach ($personal_remedit as $personal) {
                                    if($personal == '1'){
                                        echo '<p><span class=" text-green-300 text-xs font-medium me-2 px-2.5 py-0.5 rounded">' . $arr_personal[$connnnt] . '</span></p>';
                                        $cantidad++;
                                    }
                                    $connnnt++;
                                }
                                if (!$cantidad) {
                                    echo '<p><span class=" text-green-300 text-xs font-medium me-2 px-2.5 py-0.5 rounded">S/P ASIGNADO</span></p>';
                                }
                                ?>
                            </td>
                            <td class="px-3 py-4">
                                {{ $remedit->fecha_abierto }}
                            </td>
                            <td class="px-3 py-4">
                                @if (!$remedit->fecha_cerrado)
                                    <p><span
                                            class="bg-red-900 text-red-300 text-xs font-medium me-2 px-2.5 py-0.5 rounded">S/F</span>
                                    </p>
                                @else
                                    <p><span
                                            class="bg-blue-900 text-blue-300 text-xs font-medium me-2 px-2.5 py-0.5 rounded">{{ $remedit->fecha_cerrado }}</span>
                                    </p>
                                @endif
                            </td>
                            <td class="px-3 py-4">
                                <a href="{{ $remedit->url_carpeta }}" target="_blank"
                                    class="text-white focus:ring-4 font-medium rounded-lg text-xs px-3 py-2.5 me-2 mb-2 bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-blue-800">DRIVE</a>
                            </td>
                            <td class="px-3 py-4">
                                <?php $color = $remedit->estado == 'ABIERTO' ? 'green' : ($remedit->estado == 'CERRADO' ? 'red' : 'yellow'); ?>
                                <p><span
                                        class="text-<?php echo $color; ?>-300 text-sm font-medium me-2 py-0.5 rounded">{{ $remedit->estado }}</span>
                                </p>
                            </td>
                            <td class="px-3 py-4">
                                <form action="{{ url('/upload_f_ot') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="remedit" id=""
                                        value="{{ $remedit->remedit }}">
                                    <input type="hidden" name="fecha_abierto" id=""
                                        value="{{ $remedit->fecha_abierto }}">
                                    <input type="hidden" name="atm" id=""
                                            value="{{ $remedit->atm }}">
                                    <button type="submit"
                                        class="text-white focus:ring-4 font-medium rounded-lg text-xs px-3 py-2.5 me-2 mb-2 bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-blue-800">Subir
                                        fotos</button>
                                </form>
                            </td>
                            <td class="px-3 py-4">
                                <?php $color = $remedit->certificado ? 'green' : 'red'; ?>
                                <?php $palabra = $remedit->certificado ? 'SI' : 'NO'; ?>
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
            class="mb-4 text-center text-4xl font-extrabold leading-none tracking-tight text-xl text-white">
                NO EXISTEN TRABAJOS REALIZADOS.</h1>
            <h1
            class="mb-4 text-center text-4xl font-extrabold leading-none tracking-tight text-xl text-white">
                POR FAVOR REALIZA ALGUNO PARA VISUALIZAR LA TABLA DE TRABAJOS</h1>
        @endif
    </div>
</div>

@if (count($remedits))
<div class="flex flex-col items-center my-5">
    <!-- Help text -->
    <span class="text-sm text-gray-400">
        Mostrando <span class="font-semibold text-white" id="paginaActualOt"></span> de <span
            class="font-semibold text-white" id="max_pag_ot"></span> página<span id="terminacion-ot"></span>
    </span>
    <div class="inline-flex mt-2 xs:mt-0">
        <!-- Buttons -->
        <button onclick="PaginaPrevOt()"
        class="flex items-center justify-center px-4 h-10 text-base font-medium rounded-s hover:bg-gray-900 bg-gray-800 border-gray-700 text-gray-400 hover:bg-gray-700 hover:text-white">
            <svg class="w-3.5 h-3.5 me-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                fill="none" viewBox="0 0 14 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M13 5H1m0 0 4 4M1 5l4-4" />
            </svg>
            Prev
        </button>
        <button onclick="PaginaNextOt()"
        class="flex items-center justify-center px-4 h-10 text-base font-medium bg-gray-800 border-0 border-s border-gray-700 rounded-e hover:bg-gray-900 bg-gray-800 border-gray-700 text-gray-400 hover:bg-gray-700 hover:text-white">
            Next
            <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                fill="none" viewBox="0 0 14 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M1 5h12m0 0L9 1m4 4L9 9" />
            </svg>
        </button>
    </div>
</div>
@endif
<script>
    function EliminarOt(e) {
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

    function EditarBorrarOt(id) {
        var boton_editar = document.querySelector("#boton_editar_ot");
        var form_borrar = document.querySelector("#form_eliminar_ot");
        var boton_ver = document.querySelector("#boton_ver_ot");
        var boton_borrar = document.querySelector("#boton-borrar-ot");

        if (id == 0) {
            boton_editar.setAttribute('href', '')
            form_borrar.setAttribute('action', '')
            boton_borrar.setAttribute('type', 'button');
            boton_ver.setAttribute('href', '')
            return
        }
        var url = window.location + 'ot/editar/' + id;
        boton_editar.setAttribute('href', url)

        var url = window.location + 'ot/borrar/' + id;
        form_borrar.setAttribute('action', url)
        boton_borrar.setAttribute('type', 'submit');

        var url = window.location + 'ot/ver/' + id;
        boton_ver.setAttribute('href', url)
    }

    const max_registros_por_pag_ot = 5;
    var text_max_pag_ot = document.querySelector('#max_pag_ot');
    var arr_ot = <?php echo json_encode($remedits); ?>;
    var max_pag_ot = Math.ceil(arr_ot.length/max_registros_por_pag_ot);
    var terminacion_ot = document.querySelector("#terminacion-ot");
    if(terminacion_ot) 
        terminacion_ot.innerHTML = max_pag_ot == 1 ? "":"s";
    var TablaOt = document.querySelector("#tabla-ot");
    var PagActualOt = 0;
    if(TablaOt) TablaOt.innerHTML = "";
    if(text_max_pag_ot) text_max_pag_ot.innerHTML = max_pag_ot;

    document.addEventListener('DOMContentLoaded', function() {
        if(TablaOt)
            RellenarRemedits();
    });
    function PaginaNextOt(){
        if(PagActualOt < max_pag_ot-1)
            PagActualOt++

        RellenarRemedits()
    }
    function PaginaPrevOt(){
        if(PagActualOt > 0)
            PagActualOt--

        RellenarRemedits()
    }
    function RellenarRemedits(){
        var min = (max_registros_por_pag_ot * PagActualOt);
        var max = min + max_registros_por_pag_ot;
        var contador = min;
        var paginaActual = document.querySelector("#paginaActualOt");
        paginaActual.innerHTML = (PagActualOt+1);
        TablaOt.innerHTML = "";
        for (var i = contador; i < max; i++) {
            if(i >= arr_ot.length)
                continue 

            var remedit = arr_ot[i];
            if(contador >= min && contador <= max){
                var personal_asignado = remedit.personal_asignado.split(" ");
                var personales_asignados = "";
                var algun_personal = 0;
                var array_personal = <?php echo json_encode($arr_personal); ?>;
                for (var a = 0; a < personal_asignado.length; a++) {
                    if(personal_asignado[a] === '1'){
                        personales_asignados += '<p><span class=" text-green-300 text-xs font-medium me-2 px-2.5 py-0.5 rounded">'+array_personal[a]+'</span></p>';
                        algun_personal = 1;
                    }
                }
                if(!algun_personal)
                    personales_asignados = '<p><span class=" text-green-300 text-xs font-medium me-2 px-2.5 py-0.5 rounded">S/P ASIGNADO</span></p>';

                var color = remedit.estado === 'ABIERTO' ? 'green' : (remedit.estado === 'CERRADO' ? 'red' : 'yellow')
                
                var color_2 = remedit.certificado === '1' ? 'green' : 'red'
                var palabra = remedit.certificado === '1' ? 'SI' : 'NO'
                
                TablaOt.innerHTML += `
                <tr class="bg-gray-800 border-gray-700 hover:bg-gray-600">
                    <td class="w-4 p-2">
                        <div class="flex items-center">
                            <input id="${ remedit.id }_${ remedit.id }" type="radio"
                                name="remedit" onclick="EditarBorrarOt(${ remedit.id })"
                                class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-600 ring-offset-gray-800 focus:ring-offset-gray-800 focus:ring-2 bg-gray-700 border-gray-600">
                            <label for="${ remedit.id }_${ remedit.id }"
                                class="sr-only">checkbox</label>
                        </div>
                    </td>
                    <th scope="row" class="px-3 py-4 font-medium whitespace-nowrap text-white">
                        ${ remedit.remedit }
                    </th>
                    <td class="px-3 py-4">
                        ${ remedit.sucursal }
                    </td>
                    <td class="px-3 py-4">
                       ${ personales_asignados }
                    </td>
                    <td class="px-3 py-4">
                        ${ remedit.fecha_abierto }
                    </td>
                    <td class="px-3 py-4">
                        ${ (!remedit.fecha_cerrado) ? '<p><span class="bg-red-900 text-red-300 text-xs font-medium me-2 px-2.5 py-0.5 rounded">S/F</span></p>':'<p><span class="bg-blue-900 text-blue-300 text-xs font-medium me-2 px-2.5 py-0.5 rounded">'+remedit.fecha_cerrado+'</span></p>' }
                    </td>
                    <td class="px-3 py-4">
                        <a href="${ remedit.url_carpeta }" target="_blank"
                        class="text-white focus:ring-4 font-medium rounded-lg text-xs px-3 py-2.5 me-2 mb-2 bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-blue-800">DRIVE</a>
                    </td>
                    <td class="px-3 py-4">
                        <p><span class="text-${ color }-300 text-sm font-medium me-2 py-0.5 rounded">${ remedit.estado }</span></p>
                    </td>
                    <td class="px-3 py-4">
                        <form action="{{ url('/upload_f_ot') }}" method="post">
                            @csrf
                            <input type="hidden" name="remedit" id=""
                                value="${ remedit.remedit }">
                            <input type="hidden" name="fecha_abierto" id=""
                                value="${ remedit.fecha_abierto }">
                            <input type="hidden" name="atm" id=""
                                value="${ remedit.atm }">
                            <button type="submit"
                            class="text-white focus:ring-4 font-medium rounded-lg text-xs px-3 py-2.5 me-2 mb-2 bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-blue-800">Subir
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
    var buscador_remedit = document.querySelector("#buscar_remedit");
    if(buscador_remedit)
        buscador_remedit.addEventListener("keyup", (event) => {
            if (event.isComposing || event.keyCode === 229) {
                return;
            }
            if(!buscador_remedit.value){
                RellenarRemedits()
                return 
            }
            if(buscador_remedit.value){
                var filtro = buscador_remedit.value.toLowerCase();
                var filas = TablaOt.getElementsByTagName('tr');
                for (var i = 0; i < filas.length; i++) {
                    var textoFila = filas[i].children[1].innerText.toLowerCase() || filas[i].children[1].textContent.toLowerCase();
                    if (textoFila.includes(filtro))
                        filas[i].style.display = '';
                    else
                        filas[i].style.display = 'none';
                }
            }
        });
    if(buscador_remedit)
        buscador_remedit.addEventListener("keydown", (event) => {
            if (event.isComposing || event.keyCode === 229) {
                return;
            }
            if(!buscador_remedit.value){
                RellenarRemedits()
                return 
            }

            if(buscador_remedit.value){
                var filtro = buscador_remedit.value.toLowerCase();
                RemeditsCompletos();
                var filas = TablaOt.getElementsByTagName('tr');
                for (var i = 0; i < filas.length; i++) {
                    var textoFila = filas[i].children[1].innerText.toLowerCase() || filas[i].children[1].textContent.toLowerCase();
                    if (textoFila.includes(filtro)) 
                        filas[i].style.display = '';
                    else
                        filas[i].style.display = 'none';
                }
            }
        });
    boton_buscar = document.querySelector("#boton_buscar");
    if(boton_buscar)
        boton_buscar.addEventListener('click', function() {
            if(!buscador_remedit.value){
                RellenarRemedits()
                return 
            }
            if(buscador_remedit.value){
                var filtro = buscador_remedit.value.toLowerCase();
                RemeditsCompletos();
                var filas = TablaOt.getElementsByTagName('tr');
                for (var i = 0; i < filas.length; i++) {
                    var textoFila = filas[i].children[1].innerText.toLowerCase() || filas[i].children[1].textContent.toLowerCase();
                    if (textoFila.includes(filtro)) 
                        filas[i].style.display = '';
                    else
                        filas[i].style.display = 'none';
                }
            }
        });

    function RemeditsCompletos(){
        TablaOt.innerHTML = "";
        for (var i = 0; i < arr_ot.length; i++) {
            var remedit = arr_ot[i];
            var personal_asignado = remedit.personal_asignado.split(" ");
            var array_personal =  ['DIEGO ARAMAYO', 'LUIS ARAMAYO', 'ALEJANDRO SAJAMA', 'CESAR ARAMAYO'];
            var color = remedit.estado === 'ABIERTO' ? 'green' : (remedit.estado === 'CERRADO' ? 'red' : 'yellow')
            var color_2 = remedit.certificado === '1' ? 'green' : 'red'
            var palabra = remedit.certificado === '1' ? 'SI' : 'NO'
            TablaOt.innerHTML += `
            <tr class="bg-gray-800 border-gray-700 hover:bg-gray-600">
                <td class="w-4 p-2">
                    <div class="flex items-center">
                        <input id="${ remedit.id }_${ remedit.id }" type="radio"
                            name="remedit" onclick="EditarBorrarOt(${ remedit.id })"
                            class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-600 ring-offset-gray-800 focus:ring-offset-gray-800 focus:ring-2 bg-gray-700 border-gray-600">
                        <label for="${ remedit.id }_${ remedit.id }"
                            class="sr-only">checkbox</label>
                    </div>
                </td>
                <th scope="row" class="px-3 py-4 font-medium whitespace-nowrap text-white">
                    ${ remedit.remedit }
                </th>
                <td class="px-3 py-4">
                    ${ remedit.sucursal }
                </td>
                <td class="px-3 py-4">
                    ${ (personal_asignado[0] === '1') ? '<p><span class=" text-green-300 text-xs font-medium me-2 px-2.5 py-0.5 rounded">'+array_personal[0]:"" }
                    ${ (personal_asignado[1] === '1') ? '<p><span class=" text-green-300 text-xs font-medium me-2 px-2.5 py-0.5 rounded">'+array_personal[1]:"" }
                    ${ (personal_asignado[2] === '1') ? '<p><span class=" text-green-300 text-xs font-medium me-2 px-2.5 py-0.5 rounded">'+array_personal[2]:"" }
                    ${ (personal_asignado[3] === '1') ? '<p><span class=" text-green-300 text-xs font-medium me-2 px-2.5 py-0.5 rounded">'+array_personal[3]:"" }
                    ${ (personal_asignado[0] !== '1' && personal_asignado[1] !== '1' && personal_asignado[2] !== '1' && personal_asignado[3] !== '1') ? '<p><span class=" text-green-300 text-xs font-medium me-2 px-2.5 py-0.5 rounded">S/P ASIGNADO</span></p>':""}
                </td>
                <td class="px-3 py-4">
                    ${ remedit.fecha_abierto }
                </td>
                <td class="px-3 py-4">
                    ${ (!remedit.fecha_cerrado) ? '<p><span class="bg-red-900 text-red-300 text-xs font-medium me-2 px-2.5 py-0.5 rounded">S/F</span></p>':'<p><span class="bg-blue-900 text-blue-300 text-xs font-medium me-2 px-2.5 py-0.5 rounded">'+remedit.fecha_cerrado+'</span></p>' }
                </td>
                <td class="px-3 py-4">
                    <a href="${ remedit.url_carpeta }" target="_blank"
                    class="text-white focus:ring-4 font-medium rounded-lg text-xs px-3 py-2.5 me-2 mb-2 bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-blue-800">DRIVE</a>
                </td>
                <td class="px-3 py-4">
                    <p><span class="text-${ color }-300 text-sm font-medium me-2 py-0.5 rounded">${ remedit.estado }</span></p>
                </td>
                <td class="px-3 py-4">
                    <form action="{{ url('/upload_f_ot') }}" method="post">
                        @csrf
                        <input type="hidden" name="remedit" id=""
                            value="${ remedit.remedit }">
                        <input type="hidden" name="fecha_abierto" id=""
                            value="${ remedit.fecha_abierto }">
                        <input type="hidden" name="atm" id=""
                            value="${ remedit.atm }">
                        <button type="submit"
                        class="text-white focus:ring-4 font-medium rounded-lg text-xs px-3 py-2.5 me-2 mb-2 bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-blue-800">Subir
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
</script>