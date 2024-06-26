<?php 
   $lista_sucursales = [
        "100 SALTA", "100 SELECTA", "127 PLAZA EMPRESAS", "100 IPDUV", 
        "100 RENTAS SALTA", "100 ALVARADO", "109 ESPAÑA", "811 CALL CENTER", "110 MALVINAS ARGENTINAS",
        "136 LIMACHE", "100 UCASAL", "133 ALTO NOA SHOPPING",
        "137 CIUDAD DEL MILAGRO", "120 BATALLA DE SALTA", "BCRA",
        "130 PELEGRINI", "114 NORTE", "149 TERMINAL", "152 CIUDAD MUNICIPAL", "151 CIUDAD JUDICIAL",
        "174 TRIBUNALES", "170 PLAZA BELGRANO", "109 EL PUNTO", "173 GRAND BOURG",
        "175 SAN LORENZO", "121 CERRILLOS", "125 ROSARIO DE LA LERMA", "109 CO.PRO.TAB",
        "150 EL CARRIL", "101 GENERAL GÜEMES", "107 METAN", "104 ROSARIO DE LA FRONTERA",
        "113 CAFAYATE", "115 CACHI", "129 SAN ANTONIO DE LOS COBRES", "124 LAS LAJITAS",
        "106 JOAQUIN V. GONZALEZ", "105 TARTAGAL", "172 LOS TÁRTAGOS", "139 GENERAL MOSCONI", "128 AGUARAY",
        "108 POCITOS", "102 EMBARCACION", "116 PICHANAL", "103 ORAN",
        "171 SAN RAMON", "117 COLONIA SANTA ROSA", "153 A. SARAVIA"
    ];
    use App\Models\Personal;
    $personales = Personal::all();
?>
    @include('layouts.header')
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
       @if (count($errors))
        <div class="mx-5 my-2">
            <div id="alert-3" class="flex max-w-xl mx-auto items-center p-4 mb-4 text-red-400 rounded-lg bg-gray-800" role="alert">
                <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                </svg>
                <span class="sr-only">Info</span>
                <div class="ml-3 text-sm font-medium">
                    <p>PARA FINALIZAR ES NECESARIO COMPLETAR TODOS LOS CAMPOS SOLICITADOS.</p>
                </div>
                <button type="button" class="ml-auto -mx-1.5 -my-1.5 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 inline-flex items-center justify-center h-8 w-8 bg-gray-800 text-red-400 hover:bg-gray-700" data-dismiss-target="#alert-3" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                </button>
            </div>
        </div>
       @endif
       <div class="mx-5 my-6">
            <div class="max-w-xl mx-auto my-6 rounded-lg bg-gray-800 p-6" >
                <form action="{{ url('/ot/crear') }}" method="post">
                    @csrf
                    <div class="relative z-0 w-full mb-5 group grid grid-cols-1 sm:grid-cols-3 ">
                        <div>
                            <input type="text" name="remedit" id="remedit" value="{{ old('remedit') }}" class="block py-2.5 px-0 w-full text-sm bg-transparent border-0 border-b-2 appearance-none text-white border-gray-600 focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                            <label for="remedit" class="peer-focus:font-medium absolute text-sm text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">REMEDIT <p class="inline-block text-red-500">*</p></label>
                            @error('remedit')
                                <p class="pt-4 text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="text-center mx-auto">
                            <div class="flex items-center p-2 ml-6 mt-2 ">
                                <input type="checkbox" <?php echo old('combustible') ? "checked":""; ?> value="1" id="combustible" name="combustible" class="w-4 h-4 text-blue-600 rounded focus:ring-blue-600 ring-offset-gray-800 focus:ring-2 bg-gray-700 border-gray-600">
                                <label for="combustible" class="ms-2 text-sm font-medium text-gray-300">CARGA DE COMBUSTIBLE</label>
                            </div>
                        </div>
                        <div class="text-center mx-auto">
                            <div class="flex items-center p-2 ml-6 mt-2 ">
                                <input type="checkbox" <?php echo old('atm') ? "checked":""; ?> value="1" id="atm" name="atm" class="w-4 h-4 text-blue-600 rounded focus:ring-blue-600 ring-offset-gray-800 focus:ring-2 bg-gray-700 border-gray-600">
                                <label for="atm" class="ms-2 text-sm font-medium text-gray-300">ATM</label>
                            </div>
                        </div>
                    </div>
                    <div class="relative z-0 w-full mb-5 group parte-1">
                        <input type="text" name="descripcion" id="descripcion" value="{{ old('descripcion') }}" class="block py-2.5 px-0 w-full text-sm bg-transparent border-0 border-b-2 appearance-none text-white border-gray-600 focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                        <label for="descripcion" class="peer-focus:font-medium absolute text-sm text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">DESCRIPCION</label>
                        @error('descripcion')
                            <p class="pt-4 text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="relative z-0 w-full mb-5 group parte-1">
                        <input type="text" name="elementos_afectados" id="elementos_afectados" value="{{ old('elementos_afectados') }}" class="block py-2.5 px-0 w-full text-sm bg-transparent border-0 border-b-2 appearance-none text-white border-gray-600 focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                        <label for="elementos_afectados" class="peer-focus:font-medium absolute text-sm text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">ELEMENTOS AFECTADOS</label>
                        @error('elementos_afectados')
                            <p class="pt-4 text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="relative z-0 w-full mb-5 group parte-1">
                        <input type="text" name="acciones_ejecutadas" id="acciones_ejecutadas" value="{{ old('acciones_ejecutadas') }}" class="block py-2.5 px-0 w-full text-sm bg-transparent border-0 border-b-2 appearance-none text-white border-gray-600 focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                        <label for="acciones_ejecutadas" class="peer-focus:font-medium absolute text-sm text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">ACCIONES EJECUTADAS</label>
                        @error('acciones_ejecutadas')
                            <p class="pt-4 text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="relative z-0 w-full mb-5 group parte-1">
                        <input type="text" name="observaciones" id="observaciones" value="{{ old('observaciones') }}" class="block py-2.5 px-0 w-full text-sm bg-transparent border-0 border-b-2 appearance-none text-white border-gray-600 focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                        <label for="observaciones" class="peer-focus:font-medium absolute text-sm text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">OBSERVACIONES</label>
                        @error('observaciones')
                            <p class="pt-4 text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="grid md:grid-cols-2 md:gap-6 pb-6 parte-1">
                        <div class="my-3">
                            <select id="cliente" name="cliente" class="border text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500">
                                <option value="">SELECCIONAR CLIENTE <p class="inline-block text-red-500">*</p></option>
                                <option selected value="B. MACRO" >BANCO MACRO</option>
                            </select>
                            @error('cliente')
                                <p class="text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="my-3" id="sucursal">
                            <select name="sucursal" class="border text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500">
                                <option selected value="">SELECCIONAR SUCURSAL <p class="inline-block text-red-500">*</p></option>
                                @foreach ($lista_sucursales as $sucursal)
                                    <option <?php echo old('sucursal') == $sucursal ? "selected":""; ?> value="{{ $sucursal }}">{{ $sucursal }}</option>
                                @endforeach
                            </select>
                            @error('sucursal')
                                <p class="text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="personal_asignado parte-1">      
                        <h3 class="mb-4 text-sm text-gray-400">PERSONAL ASIGNADO</h3>
                        <ul class="grid grid-cols-1 sm:grid-cols-3 items-center w-full text-sm font-medium border border-gray-200 rounded-lg bg-gray-700 border-gray-600 text-white mb-6">
                            @foreach ($personales as $personal)
                                <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r border-gray-600">
                                    <div class="flex items-center ps-3">
                                        <input id="{{ $personal->nombre_personal }}" type="checkbox" <?php echo old($personal->valor) ? "checked":""; ?> name="{{ $personal->valor }}" value="{{ $personal->nombre_personal }}" class="w-4 h-4 text-blue-600 rounded focus:ring-blue-600 ring-offset-gray-700 focus:ring-offset-gray-700 focus:ring-2 bg-gray-600 border-gray-500">
                                        <label for="{{ $personal->nombre_personal }}" class="w-full py-3 ms-2 font-medium text-gray-300">{{ $personal->nombre_personal }}</label>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="estado mb-5 parte-1">      
                        <h3 class="mb-4 text-sm text-gray-400">ESTADO <p class="inline-block text-red-500">*</p></h3>
                        <select id="estado" name="estado" class="border text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500">
                            <option selected value="">SELECCIONAR ESTADO</option>
                            <option <?php echo old('estado') == "ABIERTO" ? "selected":""; ?> value="ABIERTO">ABIERTO</option>
                            <option <?php echo old('estado') == "CERRADO" ? "selected":""; ?> value="CERRADO">CERRADO</option>
                            <option <?php echo old('estado') == "PENDIENTE" ? "selected":""; ?> value="PENDIENTE">PENDIENTE</option>
                        </select>
                        @error('estado')
                            <p class="pt-4 text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="relative z-0 w-full mb-5 group">
                        <h3 class="mb-4 text-sm text-gray-400">FECHA ABIERTO <p class="inline-block text-red-500">*</p></h3>
                        <input class="bg-gray-600 text-white rounded-lg w-full" type="date" id="start" name="fecha_abierto" value="{{ old('fecha_abierto') }}" min="2018-01-01" max="2050-12-31" />
                        @error('fecha_abierto')
                            <p class="pt-4 text-red-500">{{ $message }}</p>
                        @enderror
                    </div> 
                    <div class="relative z-0 w-full mb-5 group">
                        <h3 class="mb-4 text-sm text-gray-400">FECHA CIERRE</h3>
                        <input class="bg-gray-600 text-white rounded-lg w-full" type="date" id="start" name="fecha_cerrado" value="{{ old('fecha_cerrado') }}" min="2018-01-01" max="2050-12-31" />
                        @error('fecha_cerrado')
                            <p class="pt-4 text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="relative z-0 w-full mb-5 group parte-1">
                        <label for="message" class="block mb-2 text-sm font-medium text-gray-400">PRESUPUESTO</label>
                        <textarea id="message" name="presupuesto" value="{{ old('presupuesto') }}" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Intente separar con *"></textarea>
                        @error('presupuesto')
                            <p class="pt-4 text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="text-center mx-auto my-6">
                        <div class="flex items-center justify-center">
                            <input type="checkbox" <?php echo old('certificado') ? "checked":""; ?> value="1" id="certificado" name="certificado" class="w-4 h-4 text-blue-600 rounded focus:ring-blue-600 ring-offset-gray-800 focus:ring-2 bg-gray-700 border-gray-600">
                            <label for="certificado" class="ms-2 text-sm font-medium text-gray-300">CERTIFICADO</label>
                        </div>
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

<script>
   
    var disabled = document.querySelector("#combustible");
    var atm = document.querySelector("#atm");
    var remedit = document.querySelector("#remedit"); 
    var sucursal = document.querySelector("#sucursal");
    document.addEventListener('DOMContentLoaded', function() {
        if(atm.checked)
            sucursal.style.display = "none";
        else
            sucursal.style.display = "block";

        if(disabled.checked){
            remedit.disabled = true;
            remedit.value = "";
        }else{
            remedit.disabled = false;
        }
    });

    disabled.addEventListener("click", (event) => {
        if(event.target.checked){
            remedit.disabled = true;
            remedit.value = "";
        }else{
            remedit.disabled = false;
        }
        atm.checked = false;
        sucursal.style.display = "block";
    });
    atm.addEventListener("click", (event) => {
        if(event.target.checked)
            sucursal.style.display = "none";
        else
            sucursal.style.display = "block";

        remedit.disabled = false;
        disabled.checked = false;

    });
    

</script>