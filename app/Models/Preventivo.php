<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Preventivo extends Model
{
    use HasFactory;
    protected $table = 'preventivos';
    
    protected $fillable = [
        'cliente',
        'sucursal',
        'fecha',
        'observaciones',
        'personal_asignado',
        'url_carpeta',
    ];
}