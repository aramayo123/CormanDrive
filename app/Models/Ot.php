<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ot extends Model
{
    use HasFactory;

    protected $table = 'ots';
    
    protected $fillable = [
        'remedit',
        'descripcion',
        'elementos_afectados',
        'acciones_ejecutadas',
        'observaciones',
        'cliente',
        'sucursal',
        'personal_asignado',
        'fecha_abierto',
        'fecha_cerrado',
        'url_carpeta',
        'estado',
        'presupuesto',
        'combustible',
        'certificado',
    ];
}
