<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class TpDocumentoIdentidad
 * @package App\Models
 * @version September 23, 2019, 12:22 am UTC
 *
 * @property string descripcion
 * @property string code
 * @property boolean status
 */
class TpDocumentoIdentidad extends Model
{
    use SoftDeletes;

    public $table = 'tp_documento_identidads';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'descripcion',
        'code',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'descripcion' => 'string',
        'code' => 'string',
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
