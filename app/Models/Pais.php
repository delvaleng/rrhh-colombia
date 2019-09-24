<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Pais
 * @package App\Models
 * @version September 23, 2019, 12:24 am UTC
 *
 * @property string country
 * @property boolean status
 */
class Pais extends Model
{
    use SoftDeletes;

    public $table = 'pais';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'country',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'country' => 'string',
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
