<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Rol
 * @package App\Models
 * @version September 22, 2019, 11:42 pm UTC
 *
 * @property string rol
 * @property boolean status
 */
class Rol extends Model
{
    use SoftDeletes;

    public $table = 'rols';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'rol',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'rol' => 'string',
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
