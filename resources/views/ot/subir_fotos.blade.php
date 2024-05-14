@include('layouts.header')
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
            <div class="max-w-full sm:max-w-lg mx-auto my-6 rounded-lg bg-gray-800 p-6" >
                <input type="hidden" name="remedit" id="remedit" value="{{ $remedit }}" />
                <input type="hidden" name="fecha" id="fecha" value="{{ $fecha }}" />
                <input type="hidden" name="atm" id="atm" value="{{ $atm }}" />

                <!-- EMPIEZA EL PROCESO !-->
                <label class="block mb-2 text-sm font-medium text-gray-400" for="foto_antes">FOTOS DEL ANTES </label>   
                <div class="relative z-0 w-[110%] group flex">
                    <div class="w-9/12 sm:w-9/12">
                        <input type="file" accept="image/png, image/gif, image/jpeg" name="foto_antes[]" id="foto_antes" class="block w-full text-sm border rounded-lg cursor-pointer text-white focus:outline-none bg-gray-700 border-gray-600 placeholder-gray-400" multiple>
                    </div>
                    <div class="flex"> 
                        <p class="ml-2 mt-2 text-white" id="contador-antes"></p>
                        <span class="loader p-[7px] mx-[10px] mb-[5px] mt-[7px]" id="load-antes"></span>
                        <svg class="failed mt-1 ml-1 text-red-500" id="failed-antes" width="36" height="36" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <line x1="18" y1="6" x2="6" y2="18" />  <line x1="6" y1="6" x2="18" y2="18" /></svg>
                        <svg class="success mt-1 ml-1 text-green-500" id="success-antes" width="36" height="36" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <polyline points="9 11 12 14 20 6" />  <path d="M20 12v6a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h9" /></svg>
                    </div>
                </div>
                <p class="text-yellow-300 mt-2" id="error-antes"></p>
                <!-- TERMINA EL PROCESO !-->

                <!-- EMPIEZA EL PROCESO !-->
                <label class="mt-5 block mb-2 text-sm font-medium text-gray-400" for="foto_despues">FOTOS DEL DESPUES </label>
                <div class="relative z-0 w-[110%] group flex">
                    <div class="w-9/12 sm:w-9/12">
                        <input type="file" accept="image/png, image/gif, image/jpeg" name="foto_despues[]" id="foto_despues" class="block w-full text-sm border rounded-lg cursor-pointer text-white focus:outline-none bg-gray-700 border-gray-600 placeholder-gray-400" multiple> 
                    </div>
                    <div class="flex"> 
                        <p class="ml-2 mt-2 text-white" id="contador-despues"></p>
                        <span class="loader p-[7px] mx-[10px] mb-[5px] mt-[7px]" id="load-despues"></span>
                        <svg class="failed mt-1 ml-1 text-red-500" id="failed-despues" width="36" height="36" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <line x1="18" y1="6" x2="6" y2="18" />  <line x1="6" y1="6" x2="18" y2="18" /></svg>
                        <svg class="success mt-1 ml-1 text-green-500" id="success-despues" width="36" height="36" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <polyline points="9 11 12 14 20 6" />  <path d="M20 12v6a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h9" /></svg>
                    
                    </div>
                 </div>
                <p class="text-yellow-300 mt-2" id="error-despues"></p>
                <!-- TERMINA EL PROCESO !-->

                <!-- EMPIEZA EL PROCESO !-->
                <label class="mt-5 block mb-2 text-sm font-medium text-gray-400" for="foto_ot">FOTOS DE OT </label>
                <div class="relative z-0 w-[110%] group flex">
                    <div class="w-9/12 sm:w-9/12">
                        <input type="file" accept="image/png, image/gif, image/jpeg" name="foto_ot[]" id="foto_ot" class="block w-full text-sm border rounded-lg cursor-pointer text-white focus:outline-none bg-gray-700 border-gray-600 placeholder-gray-400" multiple>
                    </div>
                    <div class="flex"> 
                        <p class="ml-2 mt-2 text-white" id="contador-ot"></p>
                        <span class="loader p-[7px] mx-[10px] mb-[5px] mt-[7px]" id="load-ot"></span>
                        <svg class="failed mt-1 ml-1 text-red-500" id="failed-ot" width="36" height="36" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <line x1="18" y1="6" x2="6" y2="18" />  <line x1="6" y1="6" x2="18" y2="18" /></svg>
                        <svg class="success mt-1 ml-1 text-green-500" id="success-ot" width="36" height="36" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <polyline points="9 11 12 14 20 6" />  <path d="M20 12v6a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h9" /></svg>
                    </div>
                </div>
                <p class="text-yellow-300 mt-2" id="error-ot"></p>
                <!-- TERMINA EL PROCESO !-->

                <!-- EMPIEZA EL PROCESO !-->
                <label class="mt-5 block mb-2 text-sm font-medium text-gray-400" for="foto_boleta">FOTOS DE BOLETA </label>
                <div class="relative z-0 w-[110%] group flex">
                    <div class="w-9/12 sm:w-9/12">
                        <input type="file" accept="image/png, image/gif, image/jpeg" name="foto_boleta[]" id="foto_boleta" class="block w-full text-sm border rounded-lg cursor-pointer text-white focus:outline-none bg-gray-700 border-gray-600 placeholder-gray-400" multiple>
                    </div>
                    <div class="flex"> 
                        <p class="ml-2 mt-2 text-white" id="contador-boleta"></p>
                        <span class="loader p-[7px] mx-[10px] mb-[5px] mt-[7px]" id="load-boleta"></span>
                        <svg class="failed mt-1 ml-1 text-red-500" id="failed-boleta" width="36" height="36" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <line x1="18" y1="6" x2="6" y2="18" />  <line x1="6" y1="6" x2="18" y2="18" /></svg>
                        <svg class="success mt-1 ml-1 text-green-500" id="success-boleta" width="36" height="36" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <polyline points="9 11 12 14 20 6" />  <path d="M20 12v6a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h9" /></svg>
                    
                    </div>
                </div>
                <p class="text-yellow-300 mt-2 " id="error-boleta"></p>
                <!-- TERMINA EL PROCESO !-->

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
    const remedit = document.querySelector('#remedit').value;
    const fecha = document.querySelector('#fecha').value;
    const atm = document.querySelector('#atm').value;
    var contadorAntes, contadorDespues, contadorOt, contadorBoleta;
    var TotalAntes, TotalDespues, TotalOt, TotalBoleta;
    document.querySelector('#foto_antes').addEventListener("change", (e) => {
        const formData = new FormData();
        contadorAntes = TotalAntes = 0;
        document.querySelector("#contador-antes").innerHTML = "";
        document.querySelector("#error-antes").innerHTML = "";
        for (var i = 0; i < e.target.files.length; i++) {
            var file = e.target.files[i];
            if(file.name.length){
                formData.append("foto_antes", file);
                formData.append("TotalAntes", TotalAntes++);
                enviarFoto(`${rutaBase}/ot/foto_antes`, formData, 'antes');
            }
        }
    });
    document.querySelector('#foto_despues').addEventListener("change", (e) => {
        const formData = new FormData();
        contadorDespues = TotalDespues = 0;
        document.querySelector("#contador-despues").innerHTML = "";
        document.querySelector("#error-despues").innerHTML = "";
        for (var i = 0; i < e.target.files.length; i++) {
            var file = e.target.files[i];
            if(file.name.length){
                formData.append("foto_despues", file);
                formData.append("TotalDespues", TotalDespues++);
                enviarFoto(`${rutaBase}/ot/foto_despues`, formData, 'despues');
            }
        }
    });
    document.querySelector('#foto_ot').addEventListener("change", (e) => {
        const formData = new FormData();
        contadorOt = TotalOt = 0;
        document.querySelector("#contador-ot").innerHTML = "";
        document.querySelector("#error-ot").innerHTML = "";
        for (var i = 0; i < e.target.files.length; i++) {
            var file = e.target.files[i];
            if(file.name.length){
                formData.append("foto_ot", file);
                formData.append("TotalOt", TotalOt++);
                enviarFoto(`${rutaBase}/ot/foto_ot`, formData, 'ot');
            }
        }
    });
    document.querySelector('#foto_boleta').addEventListener("change", (e) => {
        const formData = new FormData(); 
        contadorBoleta = TotalBoleta = 0;
        document.querySelector("#contador-boleta").innerHTML = "";
        document.querySelector("#error-boleta").innerHTML = "";
        for (var i = 0; i < e.target.files.length; i++) {
            var file = e.target.files[i];
            if(file.name.length){
                formData.append("foto_boleta", file);
                formData.append("TotalBoleta", TotalBoleta++);
                enviarFoto(`${rutaBase}/ot/foto_boleta`, formData, 'boleta');
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
        if(idElementHtml == "antes"){
            contadorAntes++

            if(contadorAntes >= TotalAntes){
                showSpinner("success-"+idElementHtml, true);
                showSpinner("load-"+idElementHtml, false);
            }

            elemento.innerHTML = contadorAntes+'/'+TotalAntes;
        }else if(idElementHtml == "despues"){
            contadorDespues++

            if(contadorDespues >= TotalDespues){
                showSpinner("success-"+idElementHtml, true); 
                showSpinner("load-"+idElementHtml, false);
            }

            elemento.innerHTML = contadorDespues+'/'+TotalDespues;
        }else if(idElementHtml == "ot"){
            contadorOt++
            if(contadorOt >= TotalOt){
                showSpinner("success-"+idElementHtml, true);
                showSpinner("load-"+idElementHtml, false);
            }
            elemento.innerHTML = contadorOt +'/'+TotalOt;
        }else if(idElementHtml == "boleta"){
            contadorBoleta++
            if(contadorBoleta >= TotalBoleta){
                showSpinner("success-"+idElementHtml, true);
                showSpinner("load-"+idElementHtml, false);
            }
            elemento.innerHTML = contadorBoleta +'/'+TotalBoleta;
        }
    }

    const enviarFoto = async (url, formData, idElementHtml) => {
        showSpinner("load-"+idElementHtml, true);
        showSpinner("success-"+idElementHtml, false);
        showSpinner("failed-"+idElementHtml, false);
        try {
            formData.append("remedit", remedit);
            formData.append("fecha", fecha);
            formData.append("atm", atm);
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
            var err = document.querySelector("#error-"+idElementHtml);
            err.innerHTML = "";
            console.log(data.message)
            if (data.errors){
                showSpinner("load-"+idElementHtml, false);
                showSpinner("success-"+idElementHtml, false);
                showSpinner("failed-"+idElementHtml, true);
                if(data.errors.foto_antes)
                    err.innerHTML = data.errors.foto_antes;
                if(data.errors.foto_despues)
                    err.innerHTML = data.errors.foto_despues;
                if(data.errors.foto_ot)
                    err.innerHTML = data.errors.foto_ot;
                if(data.errors.foto_boleta)
                    err.innerHTML = data.errors.foto_boleta;
                return
            }
            if(data.message === "Archivo no recibido."){
                showSpinner("load-"+idElementHtml, false);
                showSpinner("success-"+idElementHtml, false);
                showSpinner("failed-"+idElementHtml, true);
            }else{
                showContador(idElementHtml);
                showSpinner("failed-"+idElementHtml, false);
            }
        } catch (error){
            showSpinner("load-"+idElementHtml, false);
            showSpinner("success-"+idElementHtml, false);
            showSpinner("failed-"+idElementHtml, true);
            console.log(error)
        }
        /*
        setTimeout(function () {
            showSpinner("load-"+idElementHtml, false);
            showSpinner("success-"+idElementHtml, false);
            showSpinner("failed-"+idElementHtml, false);
        }, 5000);
        */
    }
</script>