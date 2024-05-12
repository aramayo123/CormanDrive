<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\PreventivoRequest;
use App\Models\Preventivo;
use App\Models\Personal;
use App\Http\Requests\FotoRequest;
use Illuminate\Support\Facades\Log;
USE Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Yaza\LaravelGoogleDriveStorage\Gdrive;
use App\Http\Controllers\Google_Client;
use App\Http\Controllers\Google_Service_Drive;


class PreventivoController extends Controller
{
    //
    public function Ver($id){
        $preventivo = Preventivo::findOrFail($id);
        return view('preventivo.ver', ['preventivo' => $preventivo]);
    }
    public function Crear(){
        return view('preventivo.crear');
    }
    public function Store(PreventivoRequest $request)
    {
        $preventivo = new Preventivo();
        $preventivo->cliente = $request->cliente;
        $preventivo->sucursal = $request->sucursal;
        $preventivo->fecha = $request->fecha;
        $preventivo->observaciones = $request->observaciones;

        $personales = Personal::all();
        $arr_personal = [];
        foreach($personales as $personal)
            array_push($arr_personal, [$personal->nombre_personal, 0]);

        foreach($personales as $personal){
            $input = $request->input($personal->valor);
            if($input){
                for ($i = 0; $i < count($arr_personal); $i++) {
                    if(strcasecmp($arr_personal[$i][0],$input) == 0)
                        $arr_personal[$i][1] = 1;
                }
            }
        }
        $personal_final = "";
        for ($i = 0; $i < count($arr_personal); $i++)
            $personal_final .= $arr_personal[$i][1]." ";

        $preventivo->personal_asignado = $personal_final;
        
        $arr1 = str_split($request->fecha);
        $mesInt = $arr1[5].$arr1[6];
        $meses = ["ENERO", "FEBRERO", "MARZO", "ABRIL", 
                    "MAYO", "JUNIO", "JULIO", "AGOSTO", 
                    "SEPTIEMBRE", "OCTUBRE", "NOVIEMBRE", "DICIEMBRE"];
        $mesActual = $meses[intval($mesInt)-1];

        Gdrive::makeDir('PLANILLA PREVENTIVOS/'.$mesActual."/".$request->sucursal);
        $url = Storage::disk('google')->url('PLANILLA PREVENTIVOS/'.$mesActual."/".$request->sucursal);
        $preventivo->url_carpeta = $url;
        $preventivo->certificado = $request->certificado ? $request->certificado:0;
        $preventivo->save();

        return redirect()->route('index')->with('exito', 'Preventivo creado con exito!!');
        //$message = 'NO RECARGUE LA PAGINA NI SE SALGA HASTA TERMINAR DE SUBIR LAS IMAGENES';
        //return view('preventivo.subir_fotos', ['message' => $message, 'sucursal' => $request->sucursal, 'mes' => $mesActual]);
    }
    public function Editar($id){
        $preventivo = Preventivo::findOrFail($id);
        return view('preventivo.editar', [
            'preventivo' => $preventivo,
        ]);
    }
    public function Update(PreventivoRequest $request, $id)
    {
        $preventivo = Preventivo::findOrFail($id);
        $preventivo->cliente = $request->cliente;
        $preventivo->sucursal = $request->sucursal;
        $preventivo->fecha = $request->fecha;
        $personales = Personal::all();
        $arr_personal = [];
        foreach($personales as $personal)
            array_push($arr_personal, [$personal->nombre_personal, 0]);

        foreach($personales as $personal){
            $input = $request->input($personal->valor);
            if($input){
                for ($i = 0; $i < count($arr_personal); $i++) {
                    if(strcasecmp($arr_personal[$i][0],$input) == 0)
                        $arr_personal[$i][1] = 1;
                }
            }
        }
        $personal_final = "";
        for ($i = 0; $i < count($arr_personal); $i++)
            $personal_final .= $arr_personal[$i][1]." ";

        $preventivo->personal_asignado = $personal_final;
        $preventivo->observaciones = $request->observaciones;
        $preventivo->certificado = $request->certificado ? $request->certificado:0;
        $preventivo->update();

        return redirect()->route('index')->with('exito', 'Preventivo modificado con exito!!');
        //$message = 'NO RECARGUE LA PAGINA NI SE SALGA HASTA TERMINAR DE SUBIR LAS IMAGENES';
        //return view('preventivo.subir_fotos', ['message' => $message, 'sucursal' => $request->sucursal, 'mes' => $mesActual]);
    }
    public function Borrar($id){
        $preventivo = Preventivo::findOrFail($id);
        $arr1 = str_split($preventivo->fecha);
        $mesInt = $arr1[5].$arr1[6];
        $meses = ["ENERO", "FEBRERO", "MARZO", "ABRIL", 
                    "MAYO", "JUNIO", "JULIO", "AGOSTO", 
                    "SEPTIEMBRE", "OCTUBRE", "NOVIEMBRE", "DICIEMBRE"];
        $mesActual = $meses[intval($mesInt)-1];

        $carpeta = "public/PLANILLA PREVENTIVOS/".$mesActual."/".$preventivo->sucursal;

        if(Storage::exists($carpeta))
            Storage::deleteDirectory($carpeta);

        Gdrive::deleteDir("PLANILLA PREVENTIVOS/".$mesActual."/".$preventivo->sucursal);

        Preventivo::destroy($id);
        return redirect()->route('index')->with('eliminar_preventivo', 'ok');
    }
    public function FotosPreventivo(FotoRequest $request){
        if($request->hasFile('fotos_preventivo')){
            $this->GuardarFoto($request, "", "fotos_preventivo");
            return response()->json(['message' => 'Archivo agregado con exito.']);
        }
        return response()->json(['message' => 'Archivo no recibido.'], 400);
    }
    public function FotosObervaciones(FotoRequest $request){
        if($request->hasFile('fotos_observaciones')){
            $this->GuardarFoto($request, "OBSERVACIONES", "fotos_observaciones");
            return response()->json(['message' => 'Archivo agregado con exito.']);
        }
        return response()->json(['message' => 'Archivo no recibido.'], 400);
    }
    public function FotosBoleta(FotoRequest $request){
        if($request->hasFile('fotos_boleta')){
            $this->GuardarFoto($request, "BOLETA", "fotos_boleta");
            return response()->json(['message' => 'Archivo agregado con exito.']);
        }
        return response()->json(['message' => 'Archivo no recibido.'], 400);
    }
    public function FotosOtCombustible(FotoRequest $request){
        if($request->hasFile('fotos_ot_combustible')){
            $this->GuardarFoto($request, "OT_COMBUSTIBLE", "fotos_ot_combustible");
            return response()->json(['message' => 'Archivo agregado con exito.']);
        }
        return response()->json(['message' => 'Archivo no recibido.'], 400);
    }
    public function FotosPlanillaPreventivo(FotoRequest $request){
        if($request->hasFile('fotos_planilla')){
            $this->GuardarFoto($request, "PLANILLA PREVENTIVO", "fotos_planilla");
            return response()->json(['message' => 'Archivo agregado con exito.']);
        }
        return response()->json(['message' => 'Archivo no recibido.'], 400);
    }
    protected function addFile($url, $file) {
        return Storage::putFile('storage/public/' . $url, $file, 'public');
    }
    protected function GuardarFoto(Request $request, $subcarpeta, $input_file){
        $carpeta = "PLANILLA PREVENTIVOS/".$request->mes."/".$request->sucursal."/".$subcarpeta;
        $file = $request->file($input_file);
        $imagen = $file->storeAs('public/'.$carpeta, time().'_'.$file->getClientOriginalName());
        $imagen = Storage::url($imagen);

        /** @var \Illuminate\Http\UploadedFile $disk */
        $disk = Storage::disk('google');
        $filename = time().'_'.$file->getClientOriginalName();
        $disk->putFileAs($carpeta, $file, $filename);
        // $url = $disk->url($carpeta."/".$filename); // url de la imagen

        //$partsCarpeta = explode('/', $carpeta);
        //array_pop($partsCarpeta);
        //$url = $disk->url(implode("/", $partsCarpeta)); // url de la imagen
        //return $url;
    }
    public function UploadFotosPreventivos(Request $request){
        $arr1 = str_split($request->fecha);
        $mesInt = $arr1[5].$arr1[6];
        $meses = ["ENERO", "FEBRERO", "MARZO", "ABRIL", 
                    "MAYO", "JUNIO", "JULIO", "AGOSTO", 
                    "SEPTIEMBRE", "OCTUBRE", "NOVIEMBRE", "DICIEMBRE"];
        $mesActual = $meses[intval($mesInt)-1];
        return view('preventivo.subir_fotos', ['sucursal' => $request->sucursal, 'mes' => $mesActual]);
    }
}
