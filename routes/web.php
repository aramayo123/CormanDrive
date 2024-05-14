<?php

use App\Http\Controllers\OtController;
use App\Http\Controllers\PreventivoController;
use Carbon\Carbon;
use App\Models\Ot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Yaza\LaravelGoogleDriveStorage\Gdrive;
use ZanySoft\Zip\Zip;
use \Madzipper\Zipper;
use Madnest\Madzipper\Madzipper;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function(){
    return view('index');
})->name('index');

Route::get('/ot/ver/{id}', [OtController::class, 'Ver']);
Route::post('/ot/crear', [OtController::class, 'Store']);
Route::patch('/ot/editar/{id}', [OtController::class, 'Update']);
Route::get('/ot/crear', [OtController::class, 'Crear']);
Route::get('/ot/editar/{id}', [OtController::class, 'Editar']);
Route::delete('/ot/borrar/{id}', [OtController::class, 'Borrar']);
Route::post('/ot/foto_antes', [OtController::class, 'FotoAntes']);
Route::post('/ot/foto_despues', [OtController::class, 'FotoDespues']);
Route::post('/ot/foto_ot', [OtController::class, 'FotoOt']);
Route::post('/ot/foto_boleta', [OtController::class, 'FotoBoleta']);



Route::get('/preventivo/ver/{id}', [PreventivoController::class, 'Ver']);
Route::post('/preventivo/crear', [PreventivoController::class, 'Store']);
Route::patch('/preventivo/editar/{id}', [PreventivoController::class, 'Update']);
Route::get('/preventivo/crear', [PreventivoController::class, 'Crear']);
Route::get('/preventivo/editar/{id}', [PreventivoController::class, 'Editar']);
Route::delete('/preventivo/borrar/{id}', [PreventivoController::class, 'Borrar']);
Route::post('/preventivo/fotos_preventivo', [PreventivoController::class, 'FotosPreventivo']);
Route::post('/preventivo/fotos_observaciones', [PreventivoController::class, 'FotosObervaciones']);
Route::post('/preventivo/fotos_boleta', [PreventivoController::class, 'FotosBoleta']);
Route::post('/preventivo/fotos_ot_combustible', [PreventivoController::class, 'FotosOtCombustible']);
Route::post('/preventivo/fotos_planilla', [PreventivoController::class, 'FotosPlanillaPreventivo']);


Route::post('/upload_f_ot', [OtController::class, 'UploadFotosOt']);
Route::post('/upload_f_preventivo', [PreventivoController::class, 'UploadFotosPreventivos']);

Route::post('/download', function (Request $request) {
    /*
    $folderPath = $request->folder;
    $zip = new \ZipArchive();
    $zipPath = storage_path('app/public/zipfile.zip');

    if (!($zip->open($zipPath, \ZipArchive::CREATE))) {
        return response()->json(['error' => 'No se pudo crear el archivo ZIP.']);
    }

    $rootPath = public_path('storage/' . $folderPath);
    $files = new \RecursiveIteratorIterator(
        new \RecursiveDirectoryIterator($rootPath),
        \RecursiveIteratorIterator::LEAVES_ONLY
    );

    foreach ($files as $name => $file) {
        if ($file->isDir()) continue;
        $filePath = $file->getRealPath();
        $relativePath = substr($filePath, strlen($rootPath) + 1);
        $zip->addFile($filePath, $relativePath);
    }

    $zip->close();

    $routeZip = "zips/{$request->remedit}.zip";
    
    if (!(Storage::disk('local')->put("public/{$routeZip}", file_get_contents($zipPath)))) {
        return response()->json(['error' => 'No se pudo guardar el archivo ZIP.']);
    }
    
    unlink($zipPath);

    return response()->json([
        'success' => 'Archivo ZIP creado y guardado correctamente.',
        'url' => asset("storage/{$routeZip}"),
    ]);
    */
    if(!Storage::exists("public/$request->folder")){
        return response()->json([
            'success' => 'ERROR',
            'url' => 'La descarga no se pudo completar debido a que la carpeta no contiene archivos.',
        ]);
    }
    $folderPath = $request->folder;
    $zip = new Madzipper();
    $zip->make('zips/'.$request->remedit.'.zip')->addDir('storage/'.$folderPath);
    $url = asset(asset('zips/'.$request->remedit.'.zip'));
    return response()->json([
        'success' => 'Archivo ZIP creado y guardado correctamente.',
        'url' => $url,
    ]);
    //return redirect($url);
});
