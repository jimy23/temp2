<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Test
 */
class Test extends Model
{
    protected $table = 'test';

    public $timestamps = false;

    protected $fillable = [
        'codigoTest',
        'resultado',
        'diagnostico',
        'descripcion',
        'enunciado',
        'estadoTest',
        'usuario_numeroDocumento',
        'usuario_tipoUsuario_codigoTipoUsuario',
        'tipoTest_codigoTipoTest',
        'informe_codigoInforme'
    ];

    protected $guarded = [];

        
}