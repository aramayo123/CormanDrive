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
  <meta name="csrf-token" content="{{ csrf_token() }}">
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
            <div class="max-w-xl mx-auto my-6 rounded-lg bg-gray-800 p-6" >
                <form action="{{ url('/preventivo/crear') }}" method="post">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 md:gap-6 pb-6 parte-1">
                        <select id="cliente" name="cliente" class="border text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500">
                            <option value="">SELECCIONAR CLIENTE</option>
                            <option selected value="B. MACRO" >BANCO MACRO</option>
                        </select>
                        @error('cliente')
                            <p class="text-red-500">{{ $message }}</p>
                        @enderror
                        <select id="sucursal" name="sucursal" class="mt-3 md:mt-0 border text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500">
                            <option selected value="">SELECCIONAR SUCURSAL</option>
                            <option value="100 BELGRANO 549">100 BELGRANO 549</option>
                            <option value="100 SELECTA 459 - PISO 3">100 SELECTA 459 - PISO 3</option>
                            <option value="127 ESPAÑA 550">127 ESPAÑA 550</option>
                            <option value="100 BELGRANO 1345">100 BELGRANO 1345</option>
                            <option value="100 ESPAÑA 625">100 ESPAÑA 625</option>
                            <option value="100 ALVARADO 746">100 ALVARADO 746</option>
                            <option value="109 ESPAÑA 421">109 ESPAÑA 421</option>
                            <option value="811 TUCUMAN 441">811 TUCUMAN 441</option>
                            <option value="110 LOS CHARCHALEROS 4705">110 LOS CHARCHALEROS 4705</option>
                            <option value="136 TAVELLA Y EX COM MALVINAS">136 TAVELLA Y EX COM MALVINAS</option>
                            <option value="100 CAMPO CASTAÑARES S/N">100 CAMPO CASTAÑARES S/N</option>
                            <option value="133 AV. DEL BICENTENARIO DE LA B. DE SALTA">133 AV. DEL BICENTENARIO DE LA B. DE SALTA</option>
                            <option value="137 BATALLA DE SALTA 352">137 BATALLA DE SALTA 352</option>
                            <option value="120 GRAL. GÜEMES 651">120 GRAL. GÜEMES 651</option>
                            <option value="130 C.PELEGRINI 502">130 C.PELEGRINI 502</option>
                            <option value="114 MITRE 991">114 MITRE 991</option>
                            <option value="149 HIPOLITOT IRIGOYEN 524">149 HIPOLITOT IRIGOYEN 524</option>
                            <option value="152 AV. PARAGUAY 1250">152 AV. PARAGUAY 1250</option>
                            <option value="151 AV. HOUSSAY S/N LOCAL 20">151 AV. HOUSSAY S/N LOCAL 20</option>
                            <option value="174 AV. BOLIVIA 4671">174 AV. BOLIVIA 4671</option>
                            <option value="170 AV. BELGRANO  683">170 AV. BELGRANO  683</option>
                            <option value="109 VILLA SAN LORENZO">109 VILLA SAN LORENZO</option>
                            <option value="173 FEDERICO LACROZE 4075">173 FEDERICO LACROZE 4075</option>
                            <option value="175 9 DE JULIO ESQ BOLIVIA">175 9 DE JULIO ESQ BOLIVIA</option>
                            <option value="121 GRAL. GÜEMES Nº 110">121 GRAL. GÜEMES Nº 110</option>
                            <option value="125 SARMIENTO 97">125 SARMIENTO 97</option>
                            <option value="109 ESTACION GRAL ALVARADO">109 ESTACION GRAL ALVARADO</option>
                            <option value="150 ESTACION ZUVIRIA S/N">150 ESTACION ZUVIRIA S/N</option>
                            <option value="101 ALBERRDI 413">101 ALBERRDI 413</option>
                            <option value="107 GÜEMES ESTE 217">107 GÜEMES ESTE 217</option>
                            <option value="104 MELCHORA CORNEJO 308">104 MELCHORA CORNEJO 308</option>
                            <option value="113 BARTOLOMÉ MIGRE 22">113 BARTOLOMÉ MIGRE 22</option>
                            <option value="115 AV. GRAL GUEMES S/N">115 AV. GRAL GUEMES S/N</option>
                            <option value="129 AV. GRAL. MANUEL BELGRANO">129 AV. GRAL. MANUEL BELGRANO</option>
                            <option value="124 SAN MARTÍN 315">124 SAN MARTÍN 315</option>
                            <option value="106 GÜEMES 100">106 GÜEMES 100</option>
                            <option value="105 SAN MARTÍN 301">105 SAN MARTÍN 301</option>
                            <option value="172 SAN MARTÍN 301">172 SAN MARTÍN 301</option>
                            <option value="139 CIRO ETCHESORTU 52">139 CIRO ETCHESORTU 52</option>
                            <option value="128 JUAN BAUTISTA ALBERDI 105">128 JUAN BAUTISTA ALBERDI 105</option>
                            <option value="108 BELGRANO 498">108 BELGRANO 498</option>
                            <option value="102 24 DE SEPTIEMBRE 398">102 24 DE SEPTIEMBRE 398</option>
                            <option value="116 AV. TUCUMAN ESQ AV. PUCARÁ">116 AV. TUCUMAN ESQ AV. PUCARÁ</option>
                            <option value="103 25 DE MAYO 284">103 25 DE MAYO 284</option>
                            <option value="171 ALVARADO ESQ 20 DE FEBRERO">171 ALVARADO ESQ 20 DE FEBRERO</option>
                            <option value="117 SAN MARTÍN 523">117 SAN MARTÍN 523</option>
                            <option value="153 GRAL. GÜEMES 259">153 GRAL. GÜEMES 259</option>
                        </select>
                        @error('sucursal')
                            <p class="text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="personal_asignado parte-1">      
                        <h3 class="mb-4 text-sm text-gray-400">PERSONAL ASIGNADO</h3>
                        <ul class="items-center w-full text-sm font-medium border border-gray-200 rounded-lg sm:flex bg-gray-700 border-gray-600 text-white mb-6">
                            <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r border-gray-600">
                                <div class="flex items-center ps-3">
                                    <input id="DIEGO" type="checkbox" name="personal_diego" value="DIEGO ARAMAYO" class="w-4 h-4 text-blue-600 rounded focus:ring-blue-600 ring-offset-gray-700 focus:ring-offset-gray-700 focus:ring-2 bg-gray-600 border-gray-500">
                                    <label for="DIEGO" class="w-full py-3 ms-2 font-medium text-gray-300">Diego Aramayo</label>
                                </div>
                            </li>
                            <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r border-gray-600">
                                <div class="flex items-center ps-3">
                                    <input id="LUIS" type="checkbox" name="personal_luis" value="LUIS ARAMAYO" class="w-4 h-4 text-blue-600 rounded focus:ring-blue-600 ring-offset-gray-700 focus:ring-offset-gray-700 focus:ring-2 bg-gray-600 border-gray-500">
                                    <label for="LUIS" class="w-full py-3 ms-2 font-medium text-gray-300">Luis Aramayo</label>
                                </div>
                            </li>
                            <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r border-gray-600">
                                <div class="flex items-center ps-3">
                                    <input id="ALEJANDRO" type="checkbox" name="personal_alejandro" value="ALEJANDRO SAJAMA" class="w-4 h-4 text-blue-600 rounded focus:ring-blue-500 focus:ring-blue-600 ring-offset-gray-700 focus:ring-offset-gray-700 focus:ring-2 bg-gray-600 border-gray-500">
                                    <label for="ALEJANDRO" class="w-full py-3 ms-2 font-medium text-gray-300">Alejandro Sajama</label>
                                </div>
                            </li>
                            <li class="w-full border-gray-600">
                                <div class="flex items-center ps-3">
                                    <input id="CESAR" type="checkbox" name="personal_cesar" value="CESAR ARAMAYO" class="w-4 h-4 text-blue-600 rounded focus:ring-blue-500 focus:ring-blue-600 ring-offset-gray-700 focus:ring-offset-gray-700 focus:ring-2 bg-gray-600 border-gray-500">
                                    <label for="CESAR" class="w-full py-3 ms-2 text-sm font-medium text-gray-300">Cesar Aramayo</label>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="relative z-0 w-full mb-5 group parte-1">
                        <label for="message" class="block mb-2 text-sm font-medium text-gray-400">OBSERVACIONES</label>
                        <textarea id="message" name="observaciones" value="{{ old('observaciones') }}" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Intente separar con *"></textarea>
                        @error('observaciones')
                            <p class="pt-4 text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="relative z-0 w-full mb-5 group">
                        <h3 class="mb-4 text-sm text-gray-400">FECHA</h3>
                        <input class="bg-gray-600 text-white rounded-lg w-full" type="date" id="start" name="fecha" value="{{ old('fecha') }}" min="2018-01-01" max="2050-12-31" />
                        @error('fecha')
                            <p class="pt-4 text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div class="mx-auto text-center">
                        <button type="submit" class="py-2.5 px-5 me-2 mb-2 text-sm font-medium focus:outline-none rounded-lg border focus:z-10 focus:ring-4 focus:ring-gray-100 focus:ring-gray-700 bg-gray-800 text-gray-400 border-gray-600 hover:text-white hover:bg-gray-700">GUARDAR</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>