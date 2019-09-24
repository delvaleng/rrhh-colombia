<?php

namespace App\Repositories;

use App\Models\Marcacion;
use App\Repositories\BaseRepository;

/**
 * Class MarcacionRepository
 * @package App\Repositories
 * @version September 23, 2019, 1:19 am UTC
*/

class MarcacionRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id_empleado',
        'id_tp_marcacion',
        'dia',
        'hora_inicio',
        'hora_fin',
        'total_min',
        'latitud',
        'longitud',
        'status'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Marcacion::class;
    }
    public function with($relations) {
        if (is_string($relations)) $relations = func_get_args();

        $this->with = $relations;

        return $this;
    }
}
