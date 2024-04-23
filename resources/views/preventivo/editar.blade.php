<?php 
    $lista_sucursales = [
        "100 BELGRANO 549", "100 SELECTA 459 - PISO 3", "127 ESPAÑA 550", "100 BELGRANO 1345", 
        "100 ESPAÑA 625", "100 ALVARADO 746", "109 ESPAÑA 421", "811 TUCUMAN 441", "110 LOS CHARCHALEROS 4705",
        "136 TAVELLA Y EX COM MALVINAS", "100 CAMPO CASTAÑARES S/N", "133 AV. DEL BICENTENARIO DE LA B. DE SALTA",
        "137 BATALLA DE SALTA 352", "137 BATALLA DE SALTA 352", "137 BATALLA DE SALTA 352", "120 GRAL. GÜEMES 651",
        "130 C.PELEGRINI 502", "114 MITRE 991", "149 HIPOLITOT IRIGOYEN 524", "152 AV. PARAGUAY 1250", "151 AV. HOUSSAY S/N LOCAL 20",
        "174 AV. BOLIVIA 4671", "170 AV. BELGRANO  683", "109 VILLA SAN LORENZO", "173 FEDERICO LACROZE 4075",
        "175 9 DE JULIO ESQ BOLIVIA", "121 GRAL. GÜEMES Nº 110", "125 SARMIENTO 97", "109 ESTACION GRAL ALVARADO",
        "150 ESTACION ZUVIRIA S/N", "101 ALBERRDI 413", "107 GÜEMES ESTE 217", "104 MELCHORA CORNEJO 308",
        "113 BARTOLOMÉ MIGRE 22", "115 AV. GRAL GUEMES S/N", "129 AV. GRAL. MANUEL BELGRANO", "124 SAN MARTÍN 315",
        "106 GÜEMES 100", "105 SAN MARTÍN 301", "172 SAN MARTÍN 301", "139 CIRO ETCHESORTU 52", "128 JUAN BAUTISTA ALBERDI 105",
        "108 BELGRANO 498", "102 24 DE SEPTIEMBRE 398", "116 AV. TUCUMAN ESQ AV. PUCARÁ", "103 25 DE MAYO 284",
        "171 ALVARADO ESQ 20 DE FEBRERO", "117 SAN MARTÍN 523", "153 GRAL. GÜEMES 259"
    ]
?>
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
    @include('layouts.nav')
    <div class="bg-gray-900 p-3 sm:p-5 antialiased" style="min-height: 688px;">
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
       <div class="mx-5 my-6">
            <form method="post" action="{{ url('preventivo/editar/'.$preventivo->id) }}" class="max-w-xl mx-auto my-6 rounded-lg bg-gray-800 p-6" >
                @csrf
                @method('patch')
                
                <div class="relative z-0 w-full mb-5 group">
                    <label for="message" class="block mb-2 text-sm font-medium text-gray-400">OBSERVACIONES</label>
                    <textarea id="message" name="observaciones" value="{{ $preventivo->observaciones }}" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Intente separar con *">{{ $preventivo->observaciones }}</textarea>
                    @error('observaciones')
                        <p class="pt-4 text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="grid md:grid-cols-2 md:gap-6 pb-6">
                    <select id="cliente" name="cliente" class="mt-3 border text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500">
                        <option <?php echo !($preventivo->cliente) ? 'selected':''; ?> value="">SELECCIONAR CLIENTE</option>
                        <option <?php echo ($preventivo->cliente) == 'B. MACRO' ? 'selected':''; ?> value="B. MACRO" >BANCO MACRO</option>
                    </select>
                    <select id="sucursal" name="sucursal" class="mt-3 border text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500">
                        <option <?php echo !($preventivo->sucursal) ? 'selected':''; ?> value="">SELECCIONAR SUCURSAL</option>
                        @foreach ($lista_sucursales as $sucursal)
                            <option <?php echo ($preventivo->sucursal) == $sucursal ? 'selected':''; ?> value="{{ $sucursal }}">{{ $sucursal }}</option>
                        @endforeach
                    </select>
                    @error('cliente')
                        <p class="text-red-500">{{ $message }}</p>
                    @enderror
                    @error('sucursal')
                        <p class="text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <?php 
                    $personal = str_split($preventivo->personal_asignado);
                ?>
                 <div class="personal_asignado">      
                    <h3 class="mb-4 text-sm text-gray-400">PERSONAL ASIGNADO</h3>
                    <ul class="items-center w-full text-sm font-medium border border-gray-200 rounded-lg sm:flex bg-gray-700 border-gray-600 text-white mb-6">
                        <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r border-gray-600">
                            <div class="flex items-center ps-3">
                                <input id="DIEGO" <?php echo ($personal[0]) ? "checked":""; ?> type="checkbox" name="personal_diego" value="DIEGO ARAMAYO" class="w-4 h-4 text-blue-600 rounded focus:ring-blue-600 ring-offset-gray-700 focus:ring-offset-gray-700 focus:ring-2 bg-gray-600 border-gray-500">
                                <label for="DIEGO" class="w-full py-3 ms-2 font-medium text-gray-300">Diego Aramayo</label>
                            </div>
                        </li>
                        <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r border-gray-600">
                            <div class="flex items-center ps-3">
                                <input id="LUIS" <?php echo ($personal[2]) ? "checked":""; ?> type="checkbox" name="personal_luis" value="LUIS ARAMAYO" class="w-4 h-4 text-blue-600 rounded focus:ring-blue-600 ring-offset-gray-700 focus:ring-offset-gray-700 focus:ring-2 bg-gray-600 border-gray-500">
                                <label for="LUIS" class="w-full py-3 ms-2 font-medium text-gray-300">Luis Aramayo</label>
                            </div>
                        </li>
                        <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r border-gray-600">
                            <div class="flex items-center ps-3">
                                <input id="ALEJANDRO" <?php echo ($personal[4]) ? "checked":""; ?> type="checkbox" name="personal_alejandro" value="ALEJANDRO SAJAMA" class="w-4 h-4 text-blue-600 rounded focus:ring-blue-500 focus:ring-blue-600 ring-offset-gray-700 focus:ring-offset-gray-700 focus:ring-2 bg-gray-600 border-gray-500">
                                <label for="ALEJANDRO" class="w-full py-3 ms-2 font-medium text-gray-300">Alejandro Sajama</label>
                            </div>
                        </li>
                        <li class="w-full border-gray-600">
                            <div class="flex items-center ps-3">
                                <input id="CESAR" <?php echo ($personal[6]) ? "checked":""; ?> type="checkbox" name="personal_cesar" value="CESAR ARAMAYO" class="w-4 h-4 text-blue-600 rounded focus:ring-blue-500 focus:ring-blue-600 ring-offset-gray-700 focus:ring-offset-gray-700 focus:ring-2 bg-gray-600 border-gray-500">
                                <label for="CESAR" class="w-full py-3 ms-2 text-sm font-medium text-gray-300">Cesar Aramayo</label>
                            </div>
                        </li>
                    </ul>
                </div>

                <div class="relative z-0 w-full mb-5 group">
                    <h3 class="mb-4 text-sm text-gray-400">FECHA</h3>
                    <input class="bg-gray-600 text-white rounded-lg w-full" type="date" id="start" name="fecha" value="{{ $preventivo->fecha }}" min="2018-01-01" max="2050-12-31" />
                    @error('fecha')
                        <p class="pt-4 text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mx-auto text-center">
                    <button type="submit" class="py-2.5 px-5 me-2 mb-2 text-sm font-medium focus:outline-none rounded-lg border focus:z-10 focus:ring-4 focus:ring-gray-100 focus:ring-gray-700 bg-gray-800 text-gray-400 border-gray-600 hover:text-white hover:bg-gray-700">ACTUALIZAR</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

