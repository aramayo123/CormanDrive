@php
    use App\Models\Ot;
    use App\Models\Preventivo;
    $remedits = Ot::orderByDesc('fecha_abierto')->get();
    $preventivos = Preventivo::orderByDesc('fecha')->get();

    $arr_personal = ["DIEGO ARAMAYO","LUIS ARAMAYO","ALEJANDRO SAJAMA","CESAR ARAMAYO"];
@endphp

<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <style type="text/tailwindcss">
    @layer utilities {
      .content-auto {
        content-visibility: auto;
      }
    }
  </style>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css"  rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

</head>
<body>
   
    <div class="bg-gray-900 p-3 sm:p-5 antialiased" style="min-height: 688px;"> 
        <div class="mx-auto text-center mt-2 mb-6">
            <h1 class="mb-4 text-center text-4xl font-extrabold leading-none tracking-tight md:text-5xl lg:text-6xl text-white">CORMAN FALICITIES S.R.L</h1>
            <p class="mb-6 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 xl:px-48 dark:text-gray-400">En esta seccion se encuentra disponible todo lo relacionado a OTs.</p>
            <a class="w-full sm:w-[25%] py-2.5 px-5 me-2 mb-2 text-sm font-medium focus:outline-none rounded-lg border focus:z-10 focus:ring-4 focus:ring-gray-100 focus:ring-gray-700 bg-gray-800 text-gray-400 border-gray-600 hover:text-white hover:bg-gray-700 text-center" href="{{ url('/ot/crear') }}">CREAR NUEVO OT</a>
       </div>
       <div class="mx-5 my-2">
        @if( $message = Session::get('exito'))
            <div id="alert-3" class="flex items-center p-4 mb-4 text-green-400 rounded-lg bg-gray-800" role="alert">
                <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                </svg>
                <span class="sr-only">Info</span>
                <div class="ml-3 text-sm font-medium">
                    <p>{{ $message }}</p>
                </div>
                <button type="button" class="ml-auto -mx-1.5 -my-1.5 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 inline-flex items-center justify-center h-8 w-8 bg-gray-800 text-green-400 hover:bg-gray-700" data-dismiss-target="#alert-3" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
                </button>
            </div>
        @endif
       </div>
       <div class="mx-5 my-2">
            @if (count($remedits))
                <div class="flex items-center flex-col sm:flex-row p-4 mb-4 rounded-lg bg-gray-800 text-green-400">
                    <a href="" id="boton_editar_ot" class="w-full sm:w-[33%] py-2.5 px-5 me-2 mb-2 text-sm font-medium focus:outline-none rounded-lg border focus:z-10 focus:ring-4 focus:ring-gray-100 focus:ring-gray-700 bg-gray-800 text-gray-400 border-gray-600 hover:text-white hover:bg-gray-700 text-center">EDITAR</a>
                    <form action="" method="post" onclick="EliminarOt(this)" id="form_eliminar_ot" class="hover:cursor-pointer text-center w-full sm:w-[33%] py-2.5 px-5 me-2 mb-2 text-sm font-medium focus:outline-none rounded-lg border focus:z-10 focus:ring-4 focus:ring-gray-100 focus:ring-gray-700 bg-gray-800 text-gray-400 border-gray-600 hover:text-white hover:bg-gray-700">
                        @csrf
                        @method('delete')
                        <button type="button" id="boton-borrar-ot" class="text-center mx-auto">BORRAR</button>
                    </form>
                    <a href="" id="boton_ver_ot" class="w-full sm:w-[33%] py-2.5 px-5 me-2 mb-2 text-sm font-medium focus:outline-none rounded-lg border focus:z-10 focus:ring-4 focus:ring-gray-100 focus:ring-gray-700 bg-gray-800 text-gray-400 border-gray-600 hover:text-white hover:bg-gray-700 text-center">VER</a>
                </div>
            @endif
        </div>
       <div class="mx-5 my-2">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                @if (count($remedits))
                <table class="w-full text-sm text-left rtl:text-right text-gray-400">
                    <thead class="text-xs uppercase bg-gray-700 text-gray-400">
                        <tr>
                            <th scope="col" class="p-2">
                                <div class="flex items-center">
                                    <input id="checkbox-all-search_1" type="radio" name="remedit" onclick="EditarBorrarOt(0)" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-600 ring-offset-gray-800 focus:ring-offset-gray-800 focus:ring-2 bg-gray-700 border-gray-600">
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
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($remedits as $remedit)
                        <tr class="bg-gray-800 border-gray-700 hover:bg-gray-600">
                            <td class="w-4 p-2">
                                <div class="flex items-center">
                                    <input id="{{ $remedit->id }}_{{ $remedit->id }}" type="radio" name="remedit" onclick="EditarBorrarOt({{ $remedit->id }})" class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-600 ring-offset-gray-800 focus:ring-offset-gray-800 focus:ring-2 bg-gray-700 border-gray-600">
                                    <label for="{{ $remedit->id }}_{{ $remedit->id }}" class="sr-only">checkbox</label>
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
                                    $personal_remedit = str_split($remedit->personal_asignado);
                                    if($personal_remedit[0] == '1'){
                                        echo '<p><span class=" text-green-300 text-xs font-medium me-2 px-2.5 py-0.5 rounded">'.$arr_personal[0].'</span></p>';
                                    }
                                    if($personal_remedit[2] == '1'){
                                        echo '<p><span class=" text-green-300 text-xs font-medium me-2 px-2.5 py-0.5 rounded">'.$arr_personal[1].'</span></p>';
                                    }
                                    if($personal_remedit[4] == '1'){
                                        echo '<p><span class=" text-green-300 text-xs font-medium me-2 px-2.5 py-0.5 rounded">'.$arr_personal[2].'</span></p>';
                                    }
                                    if($personal_remedit[6] == '1'){
                                        echo '<p><span class=" text-green-300 text-xs font-medium me-2 px-2.5 py-0.5 rounded">'.$arr_personal[3].'</span></p>';
                                    }
                                    if($personal_remedit[0] == '0' && $personal_remedit[2] == '0' && $personal_remedit[4] == '0' && $personal_remedit[6] == '0'){
                                        echo '<p><span class=" text-green-300 text-xs font-medium me-2 px-2.5 py-0.5 rounded">S/P ASIGNADO</span></p>';
                                    }
                                ?>
                            </td>
                            <td class="px-3 py-4">
                                {{ $remedit->fecha_abierto }}
                            </td>
                            <td class="px-3 py-4">
                                @if (!$remedit->fecha_cerrado)
                                    <p><span class="bg-red-900 text-red-300 text-xs font-medium me-2 px-2.5 py-0.5 rounded">S/F</span></p>
                                @else   
                                    <p><span class="bg-blue-900 text-blue-300 text-xs font-medium me-2 px-2.5 py-0.5 rounded">{{ $remedit->fecha_cerrado }}</span></p>
                                @endif
                            </td>
                            <td class="px-3 py-4">
                                <a href="{{ $remedit->url_carpeta }}" target="_blank" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-xs px-3 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">DRIVE</a>
                            </td>
                            <td class="px-3 py-4">
                                @if ($remedit->estado == 'ABIERTO')
                                    <p><span class="bg-green-900 text-green-300 text-xs font-medium me-2 px-2.5 py-0.5 rounded">{{ $remedit->estado }}</span></p>                             
                                @elseif ($remedit->estado == 'PENDIENTE')
                                    <p><span class="bg-yellow-900 text-yellow-300 text-xs font-medium me-2 px-2.5 py-0.5 rounded">{{ $remedit->estado }}</span></p>
                                @else
                                <p><span class="bg-red-900 text-red-300 text-xs font-medium me-2 px-2.5 py-0.5 rounded">{{ $remedit->estado }}</span></p>
                                @endif
                            </td>
                            <td class="px-3 py-4">
                                <form action="{{ url('/upload_f_ot') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="remedit" id="" value="{{ $remedit->remedit }}">
                                    <input type="hidden" name="fecha_abierto" id="" value="{{ $remedit->fecha_abierto }}">
                                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-xs px-3 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Subir fotos</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                    <h1 class="mb-4 text-center text-4xl font-extrabold leading-none tracking-tight text-gray-900 text-xl dark:text-white">NO EXISTEN TRABAJOS REALIZADOS.</h1> 
                    <h1 class="mb-4 text-center text-4xl font-extrabold leading-none tracking-tight text-gray-900 text-xl dark:text-white">POR FAVOR REALIZA ALGUNO PARA VISUALIZAR LA TABLA DE TRABAJOS</h1>
                @endif
            </div>
       </div>

       <div class="mx-auto text-center mt-[100px] mb-6">
            <p class="mb-6 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 xl:px-48 dark:text-gray-400">En esta seccion se encuentra disponible todo lo relacionado a PREVENTIVOS.</p>
            <a href="{{ url('/preventivo/crear') }}" class="w-full sm:w-[25%] py-2.5 px-5 me-2 mb-2 text-sm font-medium focus:outline-none rounded-lg border focus:z-10 focus:ring-4 focus:ring-gray-100 focus:ring-gray-700 bg-gray-800 text-gray-400 border-gray-600 hover:text-white hover:bg-gray-700 text-center">CREAR NUEVO PREVENTIVO</a>
        </div>
        
       <div class="mx-5 my-2">
            @if (count($preventivos))
                <div class="flex items-center flex-col sm:flex-row p-4 mb-4 rounded-lg bg-gray-800 text-green-400">
                    <a href="" id="boton_editar_preventivo"  class="w-full sm:w-[33%] py-2.5 px-5 me-2 mb-2 text-sm font-medium focus:outline-none rounded-lg border focus:z-10 focus:ring-4 focus:ring-gray-100 focus:ring-gray-700 bg-gray-800 text-gray-400 border-gray-600 hover:text-white hover:bg-gray-700 text-center">EDITAR</a>
                    <form action="" onclick="EliminarPreventivo(this)" method="post" id="form_eliminar_preventivo" class="hover:cursor-pointer text-center w-full sm:w-[33%] py-2.5 px-5 me-2 mb-2 text-sm font-medium focus:outline-none rounded-lg border focus:z-10 focus:ring-4 focus:ring-gray-100 focus:ring-gray-700 bg-gray-800 text-gray-400 border-gray-600 hover:text-white hover:bg-gray-700">
                        @csrf
                        @method('delete')
                        <button type="button" id="boton-borrar-preventivo" class="text-center mx-auto">BORRAR</button>
                    </form>
                    <a href="" id="boton_ver_preventivo" class="w-full sm:w-[33%] py-2.5 px-5 me-2 mb-2 text-sm font-medium focus:outline-none rounded-lg border focus:z-10 focus:ring-4 focus:ring-gray-100 focus:ring-gray-700 bg-gray-800 text-gray-400 border-gray-600 hover:text-white hover:bg-gray-700 text-center">VER</a>
                </div>
            @endif
        </div>
        <div class="mx-5 my-2">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            
                @if (count($preventivos))
                <table class="w-full text-sm text-left rtl:text-right text-gray-400">
                    <thead class="text-xs uppercase bg-gray-700 text-gray-400">
                        <tr>
                            <th scope="col" class="p-2">
                                <div class="flex items-center">
                                    <input id="checkbox-all-search_10" type="radio" name="preventivo" onclick="EditarBorrarPreventivo(0)" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-600 ring-offset-gray-800 focus:ring-offset-gray-800 focus:ring-2 bg-gray-700 border-gray-600">
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
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($preventivos as $preventivo)
                        <tr class="bg-gray-800 border-gray-700 hover:bg-gray-600">
                            <td class="w-4 p-2">
                                <div class="flex items-center">
                                    <input id="checkbox-table-search-{{ $preventivo->id }}" type="radio" name="preventivo" onclick="EditarBorrarPreventivo({{ $preventivo->id }})" class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-600 ring-offset-gray-800 focus:ring-offset-gray-800 focus:ring-2 bg-gray-700 border-gray-600">
                                    <label for="checkbox-table-search-{{ $preventivo->id }}" class="sr-only">checkbox</label>
                                </div>
                            </td>
                            <td class="px-3 py-4">
                                {{ $preventivo->sucursal }}
                            </td>
                            <td class="px-3 py-4">
                                <?php 
                                    $personal_preventivo = str_split($preventivo->personal_asignado);
                                    if($personal_preventivo[0] == '1'){
                                        echo '<p><span class="text-xs font-medium me-2 px-2.5 py-0.5 rounded text-green-300">'.$arr_personal[0].'</span></p>';
                                    }
                                    if($personal_preventivo[2] == '1'){
                                        echo '<p><span class="text-xs font-medium me-2 px-2.5 py-0.5 rounded text-green-300">'.$arr_personal[1].'</span></p>';
                                    }
                                    if($personal_preventivo[4] == '1'){
                                        echo '<p><span class="text-xs font-medium me-2 px-2.5 py-0.5 rounded text-green-300">'.$arr_personal[2].'</span></p>';
                                    }
                                    if($personal_preventivo[6] == '1'){
                                        echo '<p><span class="text-xs font-medium me-2 px-2.5 py-0.5 rounded text-green-300">'.$arr_personal[3].'</span></p>';
                                    }
                                    if($personal_preventivo[0] == '0' && $personal_preventivo[2] == '0' && $personal_preventivo[4] == '0' && $personal_preventivo[6] == '0'){
                                        echo '<p><span class="text-xs font-medium me-2 px-2.5 py-0.5 rounded text-green-300">S/P ASIGNADO</span></p>';
                                    }
                                ?>
                            </td>
                            <td class="px-3 py-4">
                                {{ $preventivo->fecha }}
                            </td>
                            <td class="px-3 py-4">
                                <a href="{{ $preventivo->url_carpeta }}" target="_blank" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-xs px-3 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">DRIVE</a>
                            </td>
                            <td class="px-3 py-4">
                                <form action="{{ url('/upload_f_preventivo') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="sucursal" id="" value="{{ $preventivo->sucursal }}">
                                    <input type="hidden" name="fecha" id="" value="{{ $preventivo->fecha }}">
                                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-xs px-3 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Subir fotos</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                    <h1 class="mb-4 text-center text-4xl font-extrabold leading-none tracking-tight text-gray-900 text-xl dark:text-white">NO EXISTEN PREVENTIVOS REALIZADOS.</h1> 
                    <h1 class="mb-4 text-center text-4xl font-extrabold leading-none tracking-tight text-gray-900 text-xl dark:text-white">POR FAVOR REALIZA ALGUNO PARA VISUALIZAR LA TABLA DE PREVENTIVOS</h1>
                @endif
            </div>
        </div>


    </div>
</body>
</html>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if(session('eliminar_ot') == 'ok')
    <script>
         Swal.fire({
            title: "Eliminado!",
            text: "Su OT ha sido eliminado con exito!.",
            icon: "success"
        });
    </script>
@endif

@if(session('eliminar_preventivo') == 'ok')
    <script>
         Swal.fire({
            title: "Eliminado!",
            text: "Su PREVENTIVO ha sido eliminado con exito!.",
            icon: "success"
        });
    </script>
@endif
<script>
    
    function EliminarOt(e){
        if(!e.children[2].type == 'button')
            return

        const rutaBase = "{{ env('APP_URL') }}";
        if(e.action == rutaBase+'/')
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
    function EditarBorrarOt(id){
        var boton_editar = document.querySelector("#boton_editar_ot");
        var form_borrar = document.querySelector("#form_eliminar_ot");
        var boton_ver = document.querySelector("#boton_ver_ot");
        var boton_borrar = document.querySelector("#boton-borrar-ot");

        if(id == 0){
            boton_editar.setAttribute('href', '')
            form_borrar.setAttribute('action', '')
            boton_borrar.setAttribute('type', 'button');
            boton_ver.setAttribute('href', '')
            return 
        }
        var url = window.location + 'ot/editar/'+id;
        boton_editar.setAttribute('href', url)

        var url = window.location + 'ot/borrar/'+id;
        form_borrar.setAttribute('action', url)
        boton_borrar.setAttribute('type', 'submit');

        var url = window.location + 'ot/ver/'+id;
        boton_ver.setAttribute('href', url)
    }
    function EliminarPreventivo(e){
        if(!e.children[2].type == 'button')
            return

        const rutaBase = "{{ env('APP_URL') }}";
        if(e.action == rutaBase+'/')
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
    function EditarBorrarPreventivo(id){
        var boton_editar = document.querySelector("#boton_editar_preventivo");
        var form_borrar = document.querySelector("#form_eliminar_preventivo");
        var boton_borrar = document.querySelector("#boton-borrar-preventivo");
        var boton_ver = document.querySelector("#boton_ver_preventivo");

        if(id == 0){
            boton_editar.setAttribute('href', '')
            form_borrar.setAttribute('action', '')
            boton_borrar.setAttribute('type', 'button');
            boton_ver.setAttribute('href', '')
            return 
        }

        var url = window.location + 'preventivo/editar/'+id;
        boton_editar.setAttribute('href', url)

        var url = window.location + 'preventivo/borrar/'+id;
        form_borrar.setAttribute('action', url)
        boton_borrar.setAttribute('type', 'submit');

        var url = window.location + 'preventivo/ver/'+id;
        boton_ver.setAttribute('href', url)
    }

</script>