@php
  use App\Models\Personal;
  $personales = Personal::all();
  $arr_personal = [];
  foreach($personales as $personal)
      array_push($arr_personal, $personal->nombre_personal);
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
              <div class="flex mx-auto text-sm uppercase text-gray-400">
                <div class=" p-2 mx-[1px] w-1/6">
                  <p>REMEDIT:</p>
                </div>
                <div class="text-white p-2 mx-[1px] break-all w-5/6">
                  <p>{{ $remedit->remedit }}</p>
                </div>
              </div>
              <hr class="mx-[1px]">

              <div class="flex mx-auto text-sm uppercase text-gray-400">
                <div class=" p-2 mx-[1px] w-1/6">
                  <p>CLIENTE:</p>
                </div>
                <div class="text-white p-2 mx-[1px] break-all w-5/6">
                  <p>{{ $remedit->cliente }}</p>
                </div>
              </div>
              <hr class="mx-[1px]">

              <div class="flex mx-auto text-sm uppercase text-gray-400">
                <div class=" p-2 mx-[1px] w-1/6">
                  <p>SUCURSAL:</p>
                </div>
                <div class="text-white p-2 mx-[1px] break-all w-5/6">
                  <p>{{ $remedit->sucursal }}</p>
                </div>
              </div>
              <hr class="mx-[1px]">

              <div class="flex mx-auto text-sm uppercase text-gray-400">
                <div class=" p-2 mx-[1px] w-1/6">
                  <p>PERSONAL ASIGNADO:</p>
                </div>
                <div class="text-white p-2 mx-[1px] break-all w-5/6">
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
                </div>
              </div>
              <hr class="mx-[1px]">


              <div class="flex mx-auto text-sm uppercase text-gray-400">
                <div class=" p-2 mx-[1px] w-1/6">
                  <p>DESCRIPCION:</p>
                </div>
                <div class="text-white p-2 mx-[1px] break-all w-5/6">
                  <p>{{ $remedit->descripcion }}</p>
                </div>
              </div>
              <hr class="mx-[1px]">

              <div class="flex mx-auto text-sm uppercase text-gray-400">
                <div class=" p-2 mx-[1px] w-1/6">
                  <p>ELEMENTOS AFECTADOS:</p>
                </div>
                <div class="text-white p-2 mx-[1px] break-all w-5/6">
                  <p>{{ $remedit->elementos_afectados }}</p>
                </div>
              </div>
              <hr class="mx-[1px]">

              <div class="flex mx-auto text-sm uppercase text-gray-400">
                <div class=" p-2 mx-[1px] w-1/6">
                  <p>ACCIONES EJECUTADAS:</p>
                </div>
                <div class="text-white p-2 mx-[1px] break-all w-5/6">
                  <p>{{ $remedit->acciones_ejecutadas }}</p>
                </div>
              </div>
              <hr class="mx-[1px]">

              <div class="flex mx-auto text-sm uppercase text-gray-400">
                <div class=" p-2 mx-[1px] w-1/6">
                  <p>OBSERVACIONES:</p>
                </div>
                <div class="text-white p-2 mx-[1px] break-all w-5/6">
                  <?php 
                    $palabras = explode("*", $remedit->observaciones);
                    foreach ($palabras as $palabra) {
                      if($palabra)
                        echo '<p class="my-2 overflow-x-auto"><strong class="text-xl text-gray-500">*</strong>'.$palabra.'</p>';
                    }
                    ?>
                </div>
              </div>
              <hr class="mx-[1px]">

              <div class="flex mx-auto text-sm uppercase text-gray-400">
                <div class=" p-2 mx-[1px] w-1/6">
                  <p>FECHA DE APERTURA:</p>
                </div>
                <div class="text-white p-2 mx-[1px] break-all w-5/6">
                  <p><span class=" text-green-300 text-sm font-medium me-2 py-0.5 rounded">{{ $remedit->fecha_abierto }}</span></p>
                </div>
              </div>
              <hr class="mx-[1px]">

              <div class="flex mx-auto text-sm uppercase text-gray-400">
                <div class=" p-2 mx-[1px] w-1/6">
                  <p>FECHA DE CIERRE:</p>
                </div>
                <div class="text-white p-2 mx-[1px] break-all w-5/6">
                  @if (!$remedit->fecha_cerrado)
                   <p><span class=" text-red-300 text-sm font-medium me-2 py-0.5 rounded">SIN FECHA</span></p>
                  @else
                    <p><span class=" text-green-300 text-sm font-medium me-2 py-0.5 rounded">{{ $remedit->fecha_cerrado }}</span></p>
                  @endif
                </div>
              </div>
              <hr class="mx-[1px]">

              <div class="flex mx-auto text-sm uppercase text-gray-400">
                <div class=" p-2 mx-[1px] w-1/6">
                  <p>CARPETA DRIVE:</p>
                </div>
                <div class="text-white p-2 mx-[1px] break-all w-5/6">
                  <a href="{{ $remedit->url_carpeta }}" class="text-white focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-2 py-2 text-center bg-blue-600 hover:bg-blue-700 focus:ring-blue-800">Click</a>
                </div>
              </div>
              <hr class="mx-[1px]">

              <div class="flex mx-auto text-sm uppercase text-gray-400">
                <div class=" p-2 mx-[1px] w-1/6">
                  <p>ESTADO:</p>
                </div>
                <div class="text-white p-2 mx-[1px] break-all w-5/6">
                  <?php $color = $remedit->estado == 'ABIERTO' ? "green":($remedit->estado == 'CERRADO' ? "red":"yellow"); ?>
                  <p><span class="text-<?php echo $color; ?>-300 text-sm font-medium me-2 py-0.5 rounded">{{ $remedit->estado }}</span></p>
                </div>
              </div>
              <hr class="mx-[1px]">

              <div class="flex mx-auto text-sm uppercase text-gray-400">
                <div class=" p-2 mx-[1px] w-1/6">
                  <p>PRESUPUESTO:</p>
                </div>
                <div class="text-white p-2 mx-[1px] break-all w-5/6">
                  <p>{{ $remedit->presupuesto }}</p>
                </div>
              </div>
              <hr class="mx-[1px]">

              <div class="text-center mx-auto text-sm uppercase text-gray-400">
                <div class="text-white p-2 mx-[1px] break-all w-full">
                  <form action="{{ url('/download') }}" method="post" id="form-ot">
                    @csrf
                    @if (!$remedit->combustible)
                      <input type="hidden" name="folder" value="OTS/{{ $remedit->remedit }}">
                    @else
                      <input type="hidden" name="folder" value="OTS/COMBUSTIBLE/{{ $remedit->fecha_abierto }}">
                    @endif
                    <input type="hidden" name="id" value="{{ $remedit->id }}">
                    <input type="hidden" name="remedit" value="{{ $remedit->remedit }}">
                    <button type="submit" class="text-white focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-2 py-2 text-center bg-blue-600 hover:bg-blue-700 focus:ring-blue-800">
                      DESCARGAR
                    </button>
                  </form>
                 
                </div>
              </div>

            </div>

            <!-- RESPONSIVE !-->

            <div class="max-w-5xl mx-auto my-6 rounded-lg bg-gray-800 p-6 block sm:hidden">
              <div class=" mx-auto text-gray-400 text-sm uppercase">
                <div class="w-full p-2 mx-[1px]">
                  <p>REMEDIT:</p>
                </div>
                <div class="text-white p-2 mx-[1px] break-all w-full">
                  <p>{{ $remedit->remedit }}</p>
                </div>
              </div>
              <hr class="mx-[1px]">

              <div class=" mx-auto text-gray-400 text-sm uppercase">
                <div class="w-full p-2 mx-[1px]">
                  <p>CLIENTE:</p>
                </div>
                <div class="text-white p-2 mx-[1px] break-all w-full">
                  <p>{{ $remedit->cliente }}</p>
                </div>
              </div>
              <hr class="mx-[1px]">

              <div class=" mx-auto text-gray-400 text-sm uppercase">
                <div class="w-full p-2 mx-[1px]">
                  <p>SUCURSAL:</p>
                </div>
                <div class="text-white p-2 mx-[1px] break-all w-full">
                  <p>{{ $remedit->sucursal }}</p>
                </div>
              </div>
              <hr class="mx-[1px]">

              <div class=" mx-auto text-gray-400 text-sm uppercase">
                <div class="w-full p-2 mx-[1px]">
                  <p>PERSONAL ASIGNADO:</p>
                </div>
                <div class="text-white p-2 mx-[1px] break-all w-full">
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
                </div>
              </div>
              <hr class="mx-[1px]">


              <div class=" mx-auto text-gray-400 text-sm uppercase">
                <div class="w-full p-2 mx-[1px]">
                  <p>DESCRIPCION:</p>
                </div>
                <div class="text-white p-2 mx-[1px] break-all w-full">
                  <p>{{ $remedit->descripcion }}</p>
                </div>
              </div>
              <hr class="mx-[1px]">

              <div class=" mx-auto text-gray-400 text-sm uppercase">
                <div class="w-full p-2 mx-[1px]">
                  <p>ELEMENTOS AFECTADOS:</p>
                </div>
                <div class="text-white p-2 mx-[1px] break-all w-full">
                  <p>{{ $remedit->elementos_afectados }}</p>
                </div>
              </div>
              <hr class="mx-[1px]">

              <div class=" mx-auto text-gray-400 text-sm uppercase">
                <div class="w-full p-2 mx-[1px]">
                  <p>ACCIONES EJECUTADAS:</p>
                </div>
                <div class="text-white p-2 mx-[1px] break-all w-full">
                  <p>{{ $remedit->acciones_ejecutadas }}</p>
                </div>
              </div>
              <hr class="mx-[1px]">

              <div class=" mx-auto text-gray-400 text-sm uppercase">
                <div class="w-full p-2 mx-[1px]">
                  <p>OBSERVACIONES:</p>
                </div>
                <div class="text-white p-2 mx-[1px] break-all w-full">
                  <?php 
                    $palabras = explode("*", $remedit->observaciones);
                    foreach ($palabras as $palabra) {
                      if($palabra)
                        echo '<p class="my-2 overflow-x-auto"><strong class="text-xl text-gray-500">*</strong>'.$palabra.'</p>';
                    }
                    ?>
                </div>
              </div>
              <hr class="mx-[1px]">

              <div class=" mx-auto text-gray-400 text-sm uppercase">
                <div class="w-full p-2 mx-[1px]">
                  <p>FECHA DE APERTURA:</p>
                </div>
                <div class="text-white p-2 mx-[1px] break-all w-full">
                  <p><span class=" text-green-300 text-sm font-medium me-2 py-0.5 rounded">{{ $remedit->fecha_abierto }}</span></p>
                </div>
              </div>
              <hr class="mx-[1px]">

              <div class=" mx-auto text-gray-400 text-sm uppercase">
                <div class="w-full p-2 mx-[1px]">
                  <p>FECHA DE CIERRE:</p>
                </div>
                <div class="text-white p-2 mx-[1px] break-all w-full">
                  @if (!$remedit->fecha_cerrado)
                   <p><span class=" text-red-300 text-sm font-medium me-2 py-0.5 rounded">SIN FECHA</span></p>
                  @else
                    <p><span class=" text-green-300 text-sm font-medium me-2 py-0.5 rounded">{{ $remedit->fecha_cerrado }}</span></p>
                  @endif
                </div>
              </div>
              <hr class="mx-[1px]">

              <div class=" mx-auto text-gray-400 text-sm uppercase">
                <div class="w-full p-2 mx-[1px]">
                  <p>CARPETA DRIVE:</p>
                </div>
                <div class="text-white p-2 mx-[1px] break-all w-full">
                  <a href="{{ $remedit->url_carpeta }}" class="text-white focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-2 py-2 text-center bg-blue-600 hover:bg-blue-700 focus:ring-blue-800">Click</a>
                </div>
              </div>
              <hr class="mx-[1px]">

              <div class=" mx-auto text-gray-400 text-sm uppercase">
                <div class="w-full p-2 mx-[1px]">
                  <p>ESTADO:</p>
                </div>
                <div class="text-white p-2 mx-[1px] break-all w-full">
                  <?php $color = $remedit->estado == 'ABIERTO' ? "green":($remedit->estado == 'CERRADO' ? "red":"yellow"); ?>
                  <p><span class="text-<?php echo $color; ?>-300 text-sm font-medium me-2 py-0.5 rounded">{{ $remedit->estado }}</span></p>
                </div>
              </div>
              <hr class="mx-[1px]">

              <div class=" mx-auto text-gray-400 text-sm uppercase">
                <div class="w-full p-2 mx-[1px]">
                  <p>PRESUPUESTO:</p>
                </div>
                <div class="text-white p-2 mx-[1px] break-all w-full">
                  <p>{{ $remedit->presupuesto }}</p>
                </div>
              </div>
              <hr class="mx-[1px]">

              <div class="text-center mx-auto text-gray-400 text-sm uppercase">
                <div class="text-white p-2 mx-[1px] break-all w-full">
                  <form action="{{ url('/download') }}" method="post" id="form-ot">
                    @csrf
                    @if (!$remedit->combustible)
                      <input type="hidden" name="folder" value="OTS/{{ $remedit->remedit }}">
                    @else
                      <input type="hidden" name="folder" value="OTS/COMBUSTIBLE/{{ $remedit->fecha_abierto }}">
                    @endif
                    <input type="hidden" name="id" value="{{ $remedit->id }}">
                    <input type="hidden" name="remedit" value="{{ $remedit->remedit }}">
                    <button type="submit" class="text-white focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-2 py-2 text-center bg-blue-600 hover:bg-blue-700 focus:ring-blue-800">
                      DESCARGAR
                    </button>
                  </form>
                </div>
              </div>
            </div>
        </div>
    </div>

    <script>
      /*
      const formulario = document.querySelector('#form-ot');
      formulario.addEventListener('submit', (e) => {
        e.preventDefault();

        const formData = new FormData(formulario);
        const data = {};
        formData.forEach((value, key) => {
          data[key] = value;
        });

        fetch(e.target.action, {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
            'CSRF-Token': data['_token'],
          },
          body: JSON.stringify(data)
        })
        .then(response => response.json())
        .then(({ url }) => {
          const a = document.createElement('a');
          a.href = url;
          a.download;
          a.target = '_blank';
          a.click();
        })
        .catch((error) => {
          console.error('Error:', error);
        });

      });
      */
    </script>
</body>

</html>
