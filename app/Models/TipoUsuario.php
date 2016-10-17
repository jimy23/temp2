<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Tipousuario
 */
class TipoUsuario extends Model
{
    protected $table = 'tipousuario';

    protected $primaryKey = 'codigoTipoUsuario';

	public $timestamps = false;

    protected $fillable = [
        'nombre'
    ];

    protected $guarded = [];

        
}