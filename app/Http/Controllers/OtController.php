<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\OtRequest;
use App\Http\Requests\FotoRequest;
use App\Models\Ot;
use Illuminate\Support\Facades\Response;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
USE Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Yaza\LaravelGoogleDriveStorage\Gdrive;

class OtController extends Controller
{
    //
    public function Ver($id){
        $remedit = Ot::findOrFail($id);
        return view('ot.ver', ['remedit' => $remedit]);
    }
    public function Crear(){
        return view('ot.crear');
    }
    public function Store(OtRequest $request)
    {
        $remedit = new Ot();
        if($request->combustible)
            $remedit->remedit = "COMBUSTIBLE";
        else
            $remedit->remedit = $request->remedit;

        $remedit->descripcion = $request->descripcion;
        $remedit->elementos_afectados = $request->elementos_afectados;
        $remedit->acciones_ejecutadas = $request->acciones_ejecutadas;
        $remedit->observaciones = $request->observaciones;
        $remedit->cliente = $request->cliente;
        $remedit->sucursal = $request->sucursal;
            
        $arr_personal = [
            ["DIEGO ARAMAYO", 0],
            ["LUIS ARAMAYO", 0],
            ["ALEJANDRO SAJAMA", 0],
            ["CESAR ARAMAYO", 0]
        ];
        if($request->personal_diego){
            for ($i = 0; $i < count($arr_personal); $i++) {
                if(strcasecmp($arr_personal[$i][0],$request->personal_diego) == 0){
                    $arr_personal[$i][1] = 1;
                }
            }
        }
        if($request->personal_luis){
            for ($i = 0; $i < count($arr_personal); $i++) {
                if(strcasecmp($arr_personal[$i][0],$request->personal_luis) == 0){
                    $arr_personal[$i][1] = 1;
                }
            }
        }
        if($request->personal_alejandro){
            for ($i = 0; $i < count($arr_personal); $i++) {
                if(strcasecmp($arr_personal[$i][0],$request->personal_alejandro) == 0){
                    $arr_personal[$i][1] = 1;
                }
            }
        }
        if($request->personal_cesar){
            for ($i = 0; $i < count($arr_personal); $i++) {
                if(strcasecmp($arr_personal[$i][0],$request->personal_cesar) == 0){
                    $arr_personal[$i][1] = 1;
                }
            }
        }
        $remedit->personal_asignado = $arr_personal[0][1]." ".$arr_personal[1][1]." ".$arr_personal[2][1]." ".$arr_personal[3][1];
        $remedit->fecha_abierto = $request->fecha_abierto;
        $remedit->fecha_cerrado = $request->fecha_cerrado;
        
        Gdrive::makeDir('OTS/'.$remedit->remedit);
        $url = Storage::disk('google')->url('OTS/'.$remedit->remedit);

        $remedit->url_carpeta = $url;
        $remedit->estado = $request->estado;
        $remedit->combustible = ($request->combustible) ? $request->combustible:0;
        $remedit->save();

        return redirect()->route('index')->with('exito', 'Remedit creado con exito!!');
        //$message = 'NO RECARGUE LA PAGINA NI SE SALGA HASTA TERMINAR DE SUBIR LAS IMAGENES';
        //return view('ot.subir_fotos', ['message' => $message, 'remedit' => $request->remedit, 'fecha' => $request->fecha_abierto]);
    }
    public function Editar($id){
        $remedit = Ot::findOrFail($id);
        return view('ot.editar', [
            'remedit' => $remedit,
        ]);
    }
    public function Update(OtRequest $request, $id)
    {
        $remedit = Ot::findOrFail($id);

        if($request->combustible)
           $remedit->remedit = "COMBUSTIBLE";
        else
            $remedit->remedit = $request->remedit;

        //if(!$request->combustible){
            //Gdrive::makeDir('OTS/'.$request->remedit);
          //  Gdrive::renameDir("/MARTIN", "LEONEL");
          //  return "";
        //}
        // else
        //   Gdrive::renameDir('OTS/'.$remedit->remedit, 'OTS/COMBUSTIBLE/'.$request->fecha);

        $remedit->descripcion = $request->descripcion;
        $remedit->elementos_afectados = $request->elementos_afectados;
        $remedit->acciones_ejecutadas = $request->acciones_ejecutadas;
        $remedit->observaciones = $request->observaciones;
        $remedit->cliente = $request->cliente;
        $remedit->sucursal = $request->sucursal;
        $arr_personal = [
            ["DIEGO ARAMAYO", 0],
            ["LUIS ARAMAYO", 0],
            ["ALEJANDRO SAJAMA", 0],
            ["CESAR ARAMAYO", 0]
        ];
        if($request->personal_diego){
            for ($i = 0; $i < count($arr_personal); $i++) {
                if(strcasecmp($arr_personal[$i][0],$request->personal_diego) == 0){
                    $arr_personal[$i][1] = 1;
                }
            }
        }
        if($request->personal_luis){
            for ($i = 0; $i < count($arr_personal); $i++) {
                if(strcasecmp($arr_personal[$i][0],$request->personal_luis) == 0){
                    $arr_personal[$i][1] = 1;
                }
            }
        }
        if($request->personal_alejandro){
            for ($i = 0; $i < count($arr_personal); $i++) {
                if(strcasecmp($arr_personal[$i][0],$request->personal_alejandro) == 0){
                    $arr_personal[$i][1] = 1;
                }
            }
        }
        if($request->personal_cesar){
            for ($i = 0; $i < count($arr_personal); $i++) {
                if(strcasecmp($arr_personal[$i][0],$request->personal_cesar) == 0){
                    $arr_personal[$i][1] = 1;
                }
            }
        }
        $remedit->personal_asignado = $arr_personal[0][1]." ".$arr_personal[1][1]." ".$arr_personal[2][1]." ".$arr_personal[3][1];
        $remedit->fecha_abierto = $request->fecha_abierto;
        $remedit->fecha_cerrado = $request->fecha_cerrado;
        $remedit->estado = $request->estado;
        //$remedit->combustible = ($request->combustible) ? $request->combustible:0;
        $remedit->update();
        return redirect()->route('index')->with('exito', 'Remedit modificado con exito!!');
        //$message = 'NO RECARGUE LA PAGINA NI SE SALGA HASTA TERMINAR DE SUBIR LAS IMAGENES';
        //return view('ot.subir_fotos', ['message' => $message, 'remedit' => $request->remedit, 'fecha' => $request->fecha_abierto]);
    }
    public function Borrar($id){
        $remedit = Ot::findOrFail($id);
        $carpeta = "public/OTS/".$remedit->remedit;
        if(Storage::exists($carpeta))
            Storage::deleteDirectory($carpeta);

        Gdrive::deleteDir("OTS/".$remedit->remedit);

        Ot::destroy($id);
        return redirect()->route('index')->with('exito', 'El remedit ha sido eliminado con exito!');
    }
    
    public function FotoAntes(FotoRequest $request){
        if($request->hasFile('foto_antes')){
            $this->GuardarFoto($request, "ANTES", "foto_antes");
            return response()->json(['message' => 'Archivo recibido']);
        }
        return response()->json(['message' => 'Archivo no recibido.'], 400);
    }
    public function FotoDespues(FotoRequest $request){
        if($request->hasFile('foto_despues')){
            $this->GuardarFoto($request, "DESPUES", "foto_despues");
            return response()->json(['message' => 'Archivo recibido']);
        }
        return response()->json(['message' => 'Archivo no recibido.'], 400);
    }
    public function FotoOt(FotoRequest $request){
        if($request->hasFile('foto_ot')){
            $this->GuardarFoto($request, "OT", "foto_ot");
            return response()->json(['message' => 'Archivo recibido']);
        }
        return response()->json(['message' => 'Archivo no recibido.'], 400);
    }
    public function FotoBoleta(FotoRequest $request){
        if($request->hasFile('foto_boleta')){
            $this->GuardarFoto($request, "BOLETA", "foto_boleta");
            return response()->json(['message' => 'Archivo recibido']);
        }
        return response()->json(['message' => 'Archivo no recibido.'], 400);
    }

    protected function addFile($url, $file) {
        return Storage::putFile('storage/public/' . $url, $file, 'public');
    }
    protected function GuardarFoto(Request $request, $subcarpeta, $input_file){
        if(strcasecmp($request->remedit, 'COMBUSTIBLE') == 0)
            $carpeta = "OTS/".$request->remedit."/".$request->fecha."/".$subcarpeta;
        else   
            $carpeta = "OTS/".$request->remedit."/".$subcarpeta;

        $file = $request->file($input_file);
        $imagen = $file->store('public/'.$carpeta);
        $imagen = Storage::url($imagen);
        //Log::notice($imagen);
        /** @var \Illuminate\Http\UploadedFile $disk */
        $disk = Storage::disk('google');
        $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();
        $disk->putFileAs($carpeta, $file, $filename);
        // $url = $disk->url($carpeta."/".$filename); // url de la imagen

        //$partsCarpeta = explode('/', $carpeta);
        //array_pop($partsCarpeta);
        //$url = $disk->url(implode("/", $partsCarpeta)); // url de la imagen
        //return $url;
    }
    public function UploadFotosOt(Request $request){
        return view('ot.subir_fotos', ['remedit' => $request->remedit, 'fecha' => $request->fecha_abierto]);
    }
}
