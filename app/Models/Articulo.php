<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    use HasFactory;
    protected $fillable = [
        'departamento',
        'municipio',
        'genero',
        'tipo_documento',
        'num_documento',
        'nombre_1',
        'nombre_2',
        'apellido_1',
        'apellido_2',
        'stock'
    ];
}
