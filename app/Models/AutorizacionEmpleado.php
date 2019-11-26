<?php

namespace App\Models;

use Eloquent as Model;
use App\Models\Empleado;
use App\Models\Marcacion;

use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class AutorizacionEmpleado
 * @package App\Models
 * @version November 26, 2019, 1:46 pm -05
 *
 * @property integer id_marcacion
 * @property integer creado_by
 * @property integer aprobado_by
 * @property string observacion
 * @property boolean status
 */
class AutorizacionEmpleado extends Model
{
    use SoftDeletes;

    public $table = 'autorizacion_empleados';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'id_marcacion',
        'creado_by',
        'aprobado_by',
        'observacion',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'id_marcacion' => 'integer',
        'creado_by' => 'integer',
        'aprobado_by' => 'integer',
        'observacion' => 'string',
        'status' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];

    public function creadoBy()
    {
      return $this->belongsTo(Empleado::class, 'creado_by');
    }

    public function aprobadoBy()
    {
      return $this->belongsTo(Empleado::class, 'aprobado_by');
    }

    public function marcacion()
    {
      return $this->belongsTo(Marcacion::class, 'id_marcacion');
    }


}
