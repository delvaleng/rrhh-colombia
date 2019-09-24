<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Empleado;

/**
 * Class PasswordoEmpleado
 * @package App\Models
 * @version September 23, 2019, 1:13 pm UTC
 *
 * @property integer id_empleado
 * @property string password
 * @property boolean status
 */
class PasswordoEmpleado extends Model
{
    use SoftDeletes;

    public $table = 'passwordo_empleados';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'id_empleado',
        'password',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'id_empleado' => 'integer',
        'password' => 'string',
        'status' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];

    public function empleado()
    {
      return $this->belongsTo(Empleado::class, 'id_empleado');
    }



}
