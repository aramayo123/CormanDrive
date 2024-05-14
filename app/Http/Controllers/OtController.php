<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\OtRequest;
use App\Http\Requests\FotoRequest;
use App\Http\Requests\OtEditRequest;
use App\Models\Ot;
use App\Models\Personal;
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

        $remedit->personal_asignado = $personal_final;

        $remedit->fecha_abierto = $request->fecha_abierto;
        $remedit->fecha_cerrado = $request->fecha_cerrado;
        
        if($request->combustible){
            Gdrive::makeDir('OTS/'.$remedit->remedit.'/'.$remedit->fecha_abierto);
            $url = Storage::disk('google')->url('OTS/'.$remedit->remedit.'/'.$remedit->fecha_abierto);
        }else{
            if($request->atm){
                Gdrive::makeDir('ATM/'.$remedit->remedit);
                $url = Storage::disk('google')->url('ATM/'.$remedit->remedit);
            }else{
                Gdrive::makeDir('OTS/'.$remedit->remedit);
                $url = Storage::disk('google')->url('OTS/'.$remedit->remedit);
            }
        }
        $remedit->url_carpeta = $url;
        $remedit->estado = $request->estado;
        $remedit->combustible = ($request->combustible) ? $request->combustible:0;
        $remedit->certificado = $request->certificado ? $request->certificado:0;
        $remedit->atm = $request->atm ? $request->atm:0;
        $remedit->save();
        if($remedit->atm)
            $message = "El ATM $remedit->remedit ha sido creado con exito!";
        else
            $message = "El ot $remedit->remedit ha sido creado con exito!";

        return redirect()->route('index')->with('exito', $message);
    }
    public function Editar($id){
        $remedit = Ot::findOrFail($id);
        return view('ot.editar', [
            'remedit' => $remedit,
        ]);
    }
    private function MoverArchivos($folderIdOrigen, $folderIdDestino){
        $archivos = Storage::disk('google')->listContents($folderIdOrigen, false);
        foreach ($archivos as $archivo) {
            if ($archivo['type'] === 'file') {
                Storage::disk('google')->move($archivo['path'], $folderIdDestino . '/' . $archivo['extraMetadata']['name']);
            }
        }
    }
    private function RenameToFolder($remPost, $remAnt, $combustible = 0, $fecha = "", $atm = 0){
        if($combustible){
            $dir = 'OTS/COMBUSTIBLE/'.$fecha;
            Gdrive::makeDir($dir);
            $url = Storage::disk('google')->url($dir);
            $folderIdOrigen = 'OTS/'.$remAnt; 
            $folderIdDestino = $dir;
        }else{
            if($atm){
                $dir = 'ATM/'.$remPost;
                Gdrive::makeDir($dir);
                $url = Storage::disk('google')->url($dir);
                $folderIdOrigen = 'ATM/'.$remAnt; 
                $folderIdDestino = $dir;
            }else{
                $dir = 'OTS/'.$remPost;
                Gdrive::makeDir($dir);
                $url = Storage::disk('google')->url($dir);
                $folderIdOrigen = 'OTS/'.$remAnt; 
                $folderIdDestino = $dir;
            }
        }
        $archivos = Storage::disk('google')->listContents($folderIdOrigen, false);
        foreach ($archivos as $archivo) {
            if ($archivo['type'] === 'file') {
                Storage::disk('google')->move($archivo['path'], $folderIdDestino . '/' . $archivo['extraMetadata']['name']);
            }else if($archivo['type'] === 'dir'){
                if($atm)
                    $newDir = 'ATM/'.$remAnt.'/'.$archivo['extraMetadata']['name'];
                else
                    $newDir = 'OTS/'.$remAnt.'/'.$archivo['extraMetadata']['name'];

                Storage::disk('google')->makeDirectory($newDir);
                $nuevoOrigen = $newDir;
                $nuevoDestino = $dir.'/'.$archivo['extraMetadata']['name'];
                $this->MoverArchivos($nuevoOrigen, $nuevoDestino);
            }
        }
        Gdrive::deleteDir($folderIdOrigen);
        Storage::disk('local')->copy("public/".$folderIdOrigen,"public/".$folderIdDestino);
        Storage::disk('local')->move("public/".$folderIdOrigen,"public/".$folderIdDestino);
        return $url;
    }
    public function Update(OtEditRequest $request, $id)
    {
        $remedit = Ot::findOrFail($id);
        if($request->remedit != $remedit->remedit){
            // SI viene para combustible 
            if($request->combustible){
                // NO estaba antes como combustible
                if(!$remedit->combustible){
                    $remedit->url_carpeta = $this->RenameToFolder($request->remedit, $remedit->remedit, $request->combustible, $remedit->fecha_abierto);
                    $remedit->remedit = "COMBUSTIBLE";
                }
            }else { 
                if($remedit->combustible){// SI viene de combustible a remedit
                    $remedit->url_carpeta = $this->RenameToFolder($request->remedit, $remedit->remedit."/".$remedit->fecha_abierto);
                    $remedit->remedit = $request->remedit;
                }else{
                    // NO viene para combustible
                    $remedit->url_carpeta = $this->RenameToFolder($request->remedit, $remedit->remedit, 0, "asd", $remedit->atm);
                    $remedit->remedit = $request->remedit;
                }
            }
        }
        $remedit->descripcion = $request->descripcion;
        $remedit->elementos_afectados = $request->elementos_afectados;
        $remedit->acciones_ejecutadas = $request->acciones_ejecutadas;
        $remedit->observaciones = $request->observaciones;
        $remedit->cliente = $request->cliente;
        $remedit->sucursal = $request->sucursal;

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

        $remedit->personal_asignado = $personal_final;
        $remedit->fecha_abierto = $request->fecha_abierto;
        $remedit->fecha_cerrado = $request->fecha_cerrado;
        $remedit->estado = $request->estado;
        $remedit->certificado = $request->certificado ? $request->certificado:0;
        $remedit->combustible = ($request->combustible) ? $request->combustible:0;
        $remedit->update();
        
        $message = "El ot $remedit->remedit ha sido creado con exito!";
        return redirect()->route('index')->with('exito', $message);
    }
    public function Borrar($id){
        $remedit = Ot::findOrFail($id);
        if($remedit->atm)
            $carpeta = "public/ATM/".$remedit->remedit;
        else
            $carpeta = "public/OTS/".$remedit->remedit;
        if(Storage::exists($carpeta))
            Storage::deleteDirectory($carpeta);

        if($remedit->atm)
            Gdrive::deleteDir("ATM/".$remedit->remedit);
        else
            Gdrive::deleteDir("OTS/".$remedit->remedit);
        
        if($remedit->atm)
            $message = "El atm $remedit->remedit ha sido eliminado con exito!";
        else
            $message = "El ot $remedit->remedit ha sido eliminado con exito!";

        Ot::destroy($id);
        return redirect()->route('index')->with('eliminar_ot', $message);
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
        if(strcasecmp($request->remedit, 'COMBUSTIBLE') == 0){
            $carpeta = "OTS/".$request->remedit."/".$request->fecha."/".$subcarpeta;
            if(strcasecmp($subcarpeta, 'BOLETA') == 0)
                $carpeta_local = $carpeta;
            else
                $carpeta_local = "OTS/".$request->remedit."/".$request->fecha; 
        }else{
            if($request->atm)
                $carpeta = "ATM/".$request->remedit."/".$subcarpeta;
            else
                $carpeta = "OTS/".$request->remedit."/".$subcarpeta;

            if(strcasecmp($subcarpeta, 'BOLETA') == 0)
                $carpeta_local = $carpeta;
            else
                if($request->atm)
                    $carpeta_local = "ATM/".$request->remedit;
                else
                    $carpeta_local = "OTS/".$request->remedit;
        }

        $file = $request->file($input_file);
        if(strcasecmp($subcarpeta, 'OT') == 0)
            $imagen = $file->storeAs('public/'.$carpeta_local, 'ot '.$file->getClientOriginalName());
        else
            $imagen = $file->storeAs('public/'.$carpeta_local, time().'_'.$file->getClientOriginalName());
        $imagen = Storage::url($imagen);

        /** @var \Illuminate\Http\UploadedFile $disk */
        $disk = Storage::disk('google');
        if(strcasecmp($subcarpeta, 'OT') == 0)
            $filename = 'ot '.$request->remedit.'.'.$file->getClientOriginalExtension();
        else
            $filename = time().'_'.$file->getClientOriginalName();
       
        $disk->putFileAs($carpeta, $file, $filename);
    }
    public function UploadFotosOt(Request $request){
        return view('ot.subir_fotos', ['remedit' => $request->remedit, 'fecha' => $request->fecha_abierto, 'atm' => $request->atm]);
    }
}
