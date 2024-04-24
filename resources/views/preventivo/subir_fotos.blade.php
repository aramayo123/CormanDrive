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
<style>
    .loader {
        width: 20px;
        height: 20px;
        border: 5px solid #FFF;
        border-bottom-color: #FF3D00;
        border-radius: 50%;
        display: inline-block;
        box-sizing: border-box;
        animation: rotation 1s linear infinite;
    }

    @keyframes rotation {
        0% {
            transform: rotate(0deg);
        }
        100% {
            transform: rotate(360deg);
        }
    } 
</style>
<body>
    @include('layouts.nav')
    <div class="bg-gray-900 p-1 antialiased" style="min-height: 688px;">
        <div class="mx-5 my-2">
            <div id="alert-3" class="flex max-w-full sm:max-w-lg mx-auto items-center p-4 mb-4 text-yellow-400 rounded-lg bg-gray-800" role="alert">
                <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                </svg>
                <span class="sr-only">Info</span>
                <div class="ml-3 text-sm font-medium">
                    <p>SOLO PUEDES SUBIR HASTA 20 IMAGENES AL MISMO TIEMPO.</p>
                </div>
            </div>
        </div>
       <div class="mx-5 my-6">
            <div class="max-w-full sm:max-w-lg mx-auto my-6 rounded-lg bg-gray-800 p-4 sm:p-6 " >
                <input type="hidden" name="sucursal" id="sucursal" value="{{ $sucursal }}" />
                <input type="hidden" name="mes" id="mes" value="{{ $mes }}" />
                
                <!-- EMPIEZA EL PROCESO !-->
                <label class="block mb-2 text-sm font-medium text-gray-400" for="fotos_preventivo">FOTOS DEL PREVENTIVO </label>   
                <div class="relative z-0 w-[110%] mb-5 group flex">
                    <div class="w-9/12 sm:w-9/12">
                        <input type="file" name="fotos_preventivo[]" id="fotos_preventivo" multiple class="block w-full text-sm border rounded-lg cursor-pointer text-white focus:outline-none bg-gray-700 border-gray-600 placeholder-gray-400">
                    </div>
                    <div class="flex"> 
                        <p class="ml-2 mt-2 text-white" id="contador-preventivo"></p>
                        <span class="loader p-[7px] mx-[10px] mb-[5px] mt-[7px]" id="load-preventivo"></span>
                        <svg class="failed mt-1 ml-1 text-red-500" id="failed-preventivo" width="36" height="36" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <line x1="18" y1="6" x2="6" y2="18" />  <line x1="6" y1="6" x2="18" y2="18" /></svg>
                        <svg class="success mt-1 ml-1 text-green-500" id="success-preventivo" width="36" height="36" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <polyline points="9 11 12 14 20 6" />  <path d="M20 12v6a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h9" /></svg>
                    </div>
                </div>
                <!-- TERMINA EL PROCESO !-->

                <!-- EMPIEZA EL PROCESO !-->
                <label class="block mb-2 text-sm font-medium text-gray-400" for="fotos_observaciones">FOTOS DE LAS OBSERVACIONES </label>   
                <div class="relative z-0 w-[110%] mb-5 group flex">
                    <div class="w-9/12 sm:w-9/12">
                        <input type="file" name="fotos_observaciones[]" id="fotos_observaciones" multiple class="block w-full text-sm border rounded-lg cursor-pointer text-white focus:outline-none bg-gray-700 border-gray-600 placeholder-gray-400">
                    </div>
                    <div class="flex"> 
                        <p class="ml-2 mt-2 text-white" id="contador-observaciones"></p>
                        <span class="loader p-[7px] mx-[10px] mb-[5px] mt-[7px]" id="load-observaciones"></span>
                        <svg class="failed mt-1 ml-1 text-red-500" id="failed-observaciones" width="36" height="36" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <line x1="18" y1="6" x2="6" y2="18" />  <line x1="6" y1="6" x2="18" y2="18" /></svg>
                        <svg class="success mt-1 ml-1 text-green-500" id="success-observaciones" width="36" height="36" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <polyline points="9 11 12 14 20 6" />  <path d="M20 12v6a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h9" /></svg>
                    </div>
                </div>
                <!-- TERMINA EL PROCESO !-->


                <!-- EMPIEZA EL PROCESO !-->
                <label class="block mb-2 text-sm font-medium text-gray-400" for="fotos_boleta">FOTOS DE BOLETAS </label>   
                <div class="relative z-0 w-[110%] mb-5 group flex">
                    <div class="w-9/12 sm:w-9/12">
                        <input type="file" name="fotos_boleta[]" id="fotos_boleta" multiple class="block w-full text-sm border rounded-lg cursor-pointer text-white focus:outline-none bg-gray-700 border-gray-600 placeholder-gray-400">
                    </div>
                    <div class="flex"> 
                        <p class="ml-2 mt-2 text-white" id="contador-boleta"></p>
                        <span class="loader p-[7px] mx-[10px] mb-[5px] mt-[7px]" id="load-boleta"></span>
                        <svg class="failed mt-1 ml-1 text-red-500" id="failed-boleta" width="36" height="36" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <line x1="18" y1="6" x2="6" y2="18" />  <line x1="6" y1="6" x2="18" y2="18" /></svg>
                        <svg class="success mt-1 ml-1 text-green-500" id="success-boleta" width="36" height="36" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <polyline points="9 11 12 14 20 6" />  <path d="M20 12v6a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h9" /></svg>
                    </div>
                </div>
                <!-- TERMINA EL PROCESO !-->

                <!-- EMPIEZA EL PROCESO !-->
                <label class="block mb-2 text-sm font-medium text-gray-400" for="fotos_ot_combustible">FOTOS DE OT Y COMBUSTIBLE</label>   
                <div class="relative z-0 w-[110%] mb-5 group flex">
                    <div class="w-9/12 sm:w-9/12">
                        <input type="file" name="fotos_ot_combustible[]" id="fotos_ot_combustible" multiple class="block w-full text-sm border rounded-lg cursor-pointer text-white focus:outline-none bg-gray-700 border-gray-600 placeholder-gray-400">
                    </div>
                    <div class="flex"> 
                        <p class="ml-2 mt-2 text-white" id="contador-ot_combustible"></p>
                        <span class="loader p-[7px] mx-[10px] mb-[5px] mt-[7px]" id="load-ot_combustible"></span>
                        <svg class="failed mt-1 ml-1 text-red-500" id="failed-ot_combustible" width="36" height="36" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <line x1="18" y1="6" x2="6" y2="18" />  <line x1="6" y1="6" x2="18" y2="18" /></svg>
                        <svg class="success mt-1 ml-1 text-green-500" id="success-ot_combustible" width="36" height="36" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <polyline points="9 11 12 14 20 6" />  <path d="M20 12v6a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h9" /></svg>
                    </div>
                </div>
                <!-- TERMINA EL PROCESO !-->

                 <!-- EMPIEZA EL PROCESO !-->
                 <label class="block mb-2 text-sm font-medium text-gray-400" for="fotos_planilla">FOTOS DE PLANILLA PREVENTIVO </label>   
                 <div class="relative z-0 w-[110%] mb-5 group flex">
                     <div class="w-9/12 sm:w-9/12">
                         <input type="file" name="fotos_planilla[]" id="fotos_planilla" multiple class="block w-full text-sm border rounded-lg cursor-pointer text-white focus:outline-none bg-gray-700 border-gray-600 placeholder-gray-400">
                     </div>
                     <div class="flex"> 
                        <p class="ml-2 mt-2 text-white" id="contador-planilla"></p>
                         <span class="loader p-[7px] mx-[10px] mb-[5px] mt-[7px]" id="load-planilla"></span>
                         <svg class="failed mt-1 ml-1 text-red-500" id="failed-planilla" width="36" height="36" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <line x1="18" y1="6" x2="6" y2="18" />  <line x1="6" y1="6" x2="18" y2="18" /></svg>
                         <svg class="success mt-1 ml-1 text-green-500" id="success-planilla" width="36" height="36" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <polyline points="9 11 12 14 20 6" />  <path d="M20 12v6a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h9" /></svg>
                     </div>
                 </div>
            
            </div>
        </div>
    </div>
</body>
</html>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const loaders = document.querySelectorAll('.loader');
        loaders.forEach(elemento => {
            elemento.style.display = 'none';
        })
        const success = document.querySelectorAll('.success');
        success.forEach(elemento => {
            elemento.style.display = 'none';
        })
        const faileds = document.querySelectorAll('.failed');
        faileds.forEach(elemento => {
            elemento.style.display = 'none';
        })
    });
    const rutaBase = "{{ env('APP_URL') }}";
    const sucursal = document.querySelector('#sucursal').value;
    const mes = document.querySelector('#mes').value;
    var contadorPreventivo, contadorObservaciones, contadorBoleta, contadorOtCombustible, contadorPlanilla;
    var TotalPreventivo, TotalObservaciones, TotalBoleta, TotalOtCombustible, TotalPlanilla;
    
    document.querySelector('#fotos_preventivo').addEventListener("change", (e) => {
        const formData = new FormData();
        contadorPreventivo = TotalPreventivo = 0;
        for (var i = 0; i < e.target.files.length; i++) {
            var file = e.target.files[i];
            if(file.name.length){
                formData.append("fotos_preventivo", file);
                formData.append("TotalPreventivo", TotalPreventivo++);
                enviarFoto(`${rutaBase}/preventivo/fotos_preventivo`, formData, 'preventivo');
            }
        }
    });

    document.querySelector('#fotos_observaciones').addEventListener("change", (e) => {
        const formData = new FormData();
        contadorObservaciones = TotalObservaciones = 0;
        for (var i = 0; i < e.target.files.length; i++) {
            var file = e.target.files[i];
            if(file.name.length){
                formData.append("fotos_observaciones", file);
                formData.append("TotalObservaciones", TotalObservaciones++);
                enviarFoto(`${rutaBase}/preventivo/fotos_observaciones`, formData, 'observaciones');
            }
        }
    });

    document.querySelector('#fotos_boleta').addEventListener("change", (e) => {
        const formData = new FormData();
        contadorBoleta = TotalBoleta = 0;
        for (var i = 0; i < e.target.files.length; i++) {
            var file = e.target.files[i];
            if(file.name.length){
                formData.append("fotos_boleta", file);
                formData.append("TotalBoleta", TotalBoleta++);
                enviarFoto(`${rutaBase}/preventivo/fotos_boleta`, formData, 'boleta');
            }
        }
    });

    document.querySelector('#fotos_ot_combustible').addEventListener("change", (e) => {
        const formData = new FormData();
        contadorOtCombustible = TotalOtCombustible = 0;
        for (var i = 0; i < e.target.files.length; i++) {
            var file = e.target.files[i];
            if(file.name.length){
                formData.append("fotos_ot_combustible", file);
                formData.append("TotalOtCombustible", TotalOtCombustible++);
                enviarFoto(`${rutaBase}/preventivo/fotos_ot_combustible`, formData, 'ot_combustible');
            }
        }
    });

    document.querySelector('#fotos_planilla').addEventListener("change", (e) => {
        const formData = new FormData();
        contadorPlanilla = TotalPlanilla = 0;
        for (var i = 0; i < e.target.files.length; i++) {
            var file = e.target.files[i];
            if(file.name.length){
                formData.append("fotos_planilla", file);
                formData.append("TotalPlanilla", TotalPlanilla++);
                enviarFoto(`${rutaBase}/preventivo/fotos_planilla`, formData, 'planilla');
            }
        }
    });
    
    const showSpinner = (idElementHtml, isLoading) => {
        var elemento = document.querySelector("#" + idElementHtml);
        if(isLoading)
            elemento.style.display = 'block';
        else
            elemento.style.display = 'none';
    }
    const showContador = (idElementHtml) => {
        var elemento = document.querySelector("#contador-" + idElementHtml);
        if(idElementHtml == "preventivo"){
            contadorPreventivo++

            if(contadorPreventivo >= TotalPreventivo){
                showSpinner("success-"+idElementHtml, true);
                showSpinner("load-"+idElementHtml, false);
            }

            elemento.innerHTML = contadorPreventivo+'/'+TotalPreventivo;
        }else if(idElementHtml == "observaciones"){
            contadorObservaciones++

            if(contadorObservaciones >= TotalObservaciones){
                showSpinner("success-"+idElementHtml, true); 
                showSpinner("load-"+idElementHtml, false);
            }

            elemento.innerHTML = contadorObservaciones+'/'+TotalObservaciones;
        }else if(idElementHtml == "boleta"){
            contadorBoleta++
            if(contadorBoleta >= TotalBoleta){
                showSpinner("success-"+idElementHtml, true);
                showSpinner("load-"+idElementHtml, false);
            }
            elemento.innerHTML = contadorBoleta +'/'+TotalBoleta;
        }else if(idElementHtml == "ot_combustible"){
            contadorOtCombustible++
            if(contadorOtCombustible >= TotalOtCombustible){
                showSpinner("success-"+idElementHtml, true);
                showSpinner("load-"+idElementHtml, false);
            }
            elemento.innerHTML = contadorOtCombustible +'/'+TotalOtCombustible;
        }else if(idElementHtml == "planilla"){
            contadorPlanilla++
            if(contadorPlanilla >= TotalPlanilla){
                showSpinner("success-"+idElementHtml, true);
                showSpinner("load-"+idElementHtml, false);
            }
            elemento.innerHTML = contadorPlanilla +'/'+TotalPlanilla;
        }
    }
    const enviarFoto = async (url, formData, idElementHtml) => {
        showSpinner("load-"+idElementHtml, true);
        showSpinner("success-"+idElementHtml, false);
        showSpinner("failed-"+idElementHtml, false);
        try {
            formData.append("sucursal", sucursal);
            formData.append("mes", mes);
            const opciones = {
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'Accept': 'application/json',
                },
                method: 'POST',
                body: formData,
            };
            const res = await fetch(url, opciones);
            const data = await res.json();
            console.log(data.message)
            if(data.message === "Archivo no recibido."){
                showSpinner("load-"+idElementHtml, false);
                showSpinner("success-"+idElementHtml, false);
                showSpinner("failed-"+idElementHtml, true);
            }else{
                showContador(idElementHtml);
                //showSpinner("load-"+idElementHtml, false);
                //showSpinner("success-"+idElementHtml, true);
                showSpinner("failed-"+idElementHtml, false);
            }
        } catch (error){
            showSpinner("load-"+idElementHtml, false);
            showSpinner("success-"+idElementHtml, false);
            showSpinner("failed-"+idElementHtml, true);
            console.log(error)
        }
    }
</script>