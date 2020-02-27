<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class HorarioUser
 * @package App\Models
 * @version February 27, 2020, 10:36 am -05
 *
 * @property integer id_empleado
 * @property boolean status
 */
class HorarioUser extends Model
{
    use SoftDeletes;

    public $table = 'horario_users';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'id_empleado',
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
