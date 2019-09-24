<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Permiso
 * @package App\Models
 * @version September 22, 2019, 11:43 pm UTC
 *
 * @property string permiso
 * @property boolean status
 */
class Permiso extends Model
{
    use SoftDeletes;

    public $table = 'permisos';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'permiso',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'permiso' => 'string',
        'status' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
