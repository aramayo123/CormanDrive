@php

    $arr_personal = ['DIEGO ARAMAYO', 'LUIS ARAMAYO', 'ALEJANDRO SAJAMA', 'CESAR ARAMAYO'];
@endphp
    @include('layouts.header')
    @include('layouts.nav')
    <div class="bg-gray-900 p-3 sm:p-5 antialiased" style="min-height: 688px;">
        <div class="mx-auto text-center mt-2 mb-6">
            <h1
                class="mb-4 text-center text-4xl font-extrabold leading-none tracking-tight md:text-5xl lg:text-6xl text-white">
                CORMAN FALICITIES S.R.L</h1>
        </div>
        <div class="mx-5 my-2">
            @if ($message = Session::get('exito'))
                <div id="alert-3" class="flex items-center p-4 mb-4 text-green-400 rounded-lg bg-gray-800"
                    role="alert">
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
        <div class="mx-5 my-6">
            <div class="max-w-5xl mx-auto my-6 rounded-lg bg-gray-800 p-6 hidden sm:block">

              
              <div class="flex mx-auto text-white text-sm uppercase text-gray-400">
                <div class=" p-2 mx-[1px] w-1/6">
                  <p>CLIENTE:</p>
                </div>
                <div class=" p-2 mx-[1px] break-all w-5/6">
                  <p>{{ $preventivo->cliente }}</p>
                </div>
              </div>
              <hr class="mx-[1px]">

              <div class="flex mx-auto text-white text-sm uppercase text-gray-400">
                <div class=" p-2 mx-[1px] w-1/6">
                  <p>SUCURSAL:</p>
                </div>
                <div class=" p-2 mx-[1px] break-all w-5/6">
                  <p>{{ $preventivo->sucursal }}</p>
                </div>
              </div>
              <hr class="mx-[1px]">

              <div class="flex mx-auto text-white text-sm uppercase text-gray-400">
                <div class=" p-2 mx-[1px] w-1/6">
                  <p>PERSONAL ASIGNADO:</p>
                </div>
                <div class=" p-2 mx-[1px] break-all w-5/6">
                  <?php 
                    $personal_preventivo = str_split($preventivo->personal_asignado);
                    if($personal_preventivo[0] == '1'){
                        echo '<p><span class=" text-green-300 text-sm font-medium me-2 py-0.5 rounded">'.$arr_personal[0].'</span></p>';
                    }
                    if($personal_preventivo[2] == '1'){
                        echo '<p><span class=" text-green-300 text-sm font-medium me-2 py-0.5 rounded">'.$arr_personal[1].'</span></p>';
                    }
                    if($personal_preventivo[4] == '1'){
                        echo '<p><span class=" text-green-300 text-sm font-medium me-2 py-0.5 rounded">'.$arr_personal[2].'</span></p>';
                    }
                    if($personal_preventivo[6] == '1'){
                        echo '<p><span class=" text-green-300 text-sm font-medium me-2 py-0.5 rounded">'.$arr_personal[3].'</span></p>';
                    }
                    if($personal_preventivo[0] == '0' && $personal_preventivo[2] == '0' && $personal_preventivo[4] == '0' && $personal_preventivo[6] == '0'){
                        echo '<p><span class=" text-green-300 text-sm font-medium me-2 py-0.5 rounded">S/P ASIGNADO</span></p>';
                    }
                  ?>
                </div>
              </div>
              <hr class="mx-[1px]">

              <div class="flex mx-auto text-white text-sm uppercase text-gray-400">
                <div class=" p-2 mx-[1px] w-1/6">
                  <p>FECHA:</p>
                </div>
                <div class=" p-2 mx-[1px] break-all w-5/6">
                  <p><span class=" text-green-300 text-sm font-medium me-2 py-0.5 rounded">{{ $preventivo->fecha }}</span></p>
                </div>
              </div>
              <hr class="mx-[1px]">

              <div class="flex mx-auto text-white text-sm uppercase text-gray-400">
                <div class=" p-2 mx-[1px] w-1/6">
                  <p>CARPETA DRIVE:</p>
                </div>
                <div class=" p-2 mx-[1px] break-all w-5/6">
                  <a href="{{ $preventivo->url_carpeta }}" class="text-white focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-2 py-2 text-center bg-blue-600 hover:bg-blue-700 focus:ring-blue-800">Click</a>
                </div>
              </div>
              <hr class="mx-[1px]">

             
              <div class="flex mx-auto text-white text-sm uppercase text-gray-400">
                <div class=" p-2 mx-[1px] w-1/6">
                  <p>OBSERVACIONES:</p>
                </div>
                <div class=" p-2 mx-[1px] break-all w-5/6">
                  <?php 
                    $palabras = explode("*", $preventivo->observaciones);
                    foreach ($palabras as $palabra) {
                      echo '<p>'.$palabra.'</p>';
                    }
                    ?>
                </div>
              </div>
              <hr class="mx-[1px]">

            </div>


            <div class="max-w-5xl mx-auto my-6 rounded-lg bg-gray-800 p-6 block sm:hidden">

              
              <div class=" mx-auto text-gray-400 text-sm uppercase">
                <div class=" p-2 mx-[1px]">
                  <p>CLIENTE:</p>
                </div>
                <div class="text-white p-2 mx-[1px] break-all">
                  <p>{{ $preventivo->cliente }}</p>
                </div>
              </div>
              <hr class="mx-[1px]">

              <div class=" mx-auto text-gray-400 text-sm uppercase">
                <div class=" p-2 mx-[1px]">
                  <p>SUCURSAL:</p>
                </div>
                <div class="text-white p-2 mx-[1px] break-all">
                  <p>{{ $preventivo->sucursal }}</p>
                </div>
              </div>
              <hr class="mx-[1px]">

              <div class=" mx-auto text-gray-400 text-sm uppercase">
                <div class=" p-2 mx-[1px]">
                  <p>PERSONAL ASIGNADO:</p>
                </div>
                <div class="text-white p-2 mx-[1px] break-all">
                  <?php 
                    $personal_preventivo = str_split($preventivo->personal_asignado);
                    if($personal_preventivo[0] == '1'){
                        echo '<p><span class=" text-green-300 text-sm font-medium me-2 py-0.5 rounded">'.$arr_personal[0].'</span></p>';
                    }
                    if($personal_preventivo[2] == '1'){
                        echo '<p><span class=" text-green-300 text-sm font-medium me-2 py-0.5 rounded">'.$arr_personal[1].'</span></p>';
                    }
                    if($personal_preventivo[4] == '1'){
                        echo '<p><span class=" text-green-300 text-sm font-medium me-2 py-0.5 rounded">'.$arr_personal[2].'</span></p>';
                    }
                    if($personal_preventivo[6] == '1'){
                        echo '<p><span class=" text-green-300 text-sm font-medium me-2 py-0.5 rounded">'.$arr_personal[3].'</span></p>';
                    }
                    if($personal_preventivo[0] == '0' && $personal_preventivo[2] == '0' && $personal_preventivo[4] == '0' && $personal_preventivo[6] == '0'){
                        echo '<p><span class=" text-green-300 text-sm font-medium me-2 py-0.5 rounded">S/P ASIGNADO</span></p>';
                    }
                  ?>
                </div>
              </div>
              <hr class="mx-[1px]">

              <div class=" mx-auto text-gray-400 text-sm uppercase">
                <div class=" p-2 mx-[1px]">
                  <p>FECHA:</p>
                </div>
                <div class="text-white p-2 mx-[1px] break-all">
                  <p><span class=" text-green-300 text-sm font-medium me-2 py-0.5 rounded">{{ $preventivo->fecha }}</span></p>
                </div>
              </div>
              <hr class="mx-[1px]">

              <div class=" mx-auto text-gray-400 text-sm uppercase">
                <div class=" p-2 mx-[1px]">
                  <p>CARPETA DRIVE:</p>
                </div>
                <div class="text-white p-2 mx-[1px] break-all">
                  <a href="{{ $preventivo->url_carpeta }}" class="text-white focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-2 py-2 text-center bg-blue-600 hover:bg-blue-700 focus:ring-blue-800">Click</a>
                </div>
              </div>
              <hr class="mx-[1px]">

             
              <div class=" mx-auto text-gray-400 text-sm uppercase">
                <div class=" p-2 mx-[1px]">
                  <p>OBSERVACIONES:</p>
                </div>
                <div class="text-white p-2 mx-[1px] break-all">
                  <?php 
                    $palabras = explode("*", $preventivo->observaciones);
                    foreach ($palabras as $palabra) {
                      echo '<p>'.$palabra.'</p>';
                    }
                    ?>
                </div>
              </div>
              <hr class="mx-[1px]">

            </div>
        </div>
    </div>
</body>

</html>
