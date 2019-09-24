<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\TpDocumentoIdentidad;
use App\Models\Pais;

/**
 * Class Empleado
 * @package App\Models
 * @version September 23, 2019, 12:28 am UTC
 *
 * @property integer id_tp_documento_identidad
 * @property integer id_pais
 * @property string nombre
 * @property string apellido
 * @property string num_documento
 * @property string usuario
 * @property boolean status
 */
class Empleado extends Model
{
    use SoftDeletes;

    public $table = 'empleados';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'id_tp_documento_identidad',
        'id_pais',
        'nombre',
        'apellido',
        'num_documento',
        'usuario',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'id_tp_documento_identidad' => 'integer',
        'id_pais' => 'integer',
        'nombre' => 'string',
        'apellido' => 'string',
        'num_documento' => 'string',
        'usuario' => 'string',
        'status' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];

    public function tpDocumentIdent()
    {
      return $this->belongsTo(TpDocumentoIdentidad::class, 'id_tp_documento_identidad');
    }

    public function paisEmpleado()
    {
      return $this->belongsTo(Pais::class,     'id_pais');
    }

}
