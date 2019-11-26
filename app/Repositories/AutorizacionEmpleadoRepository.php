<?php

namespace App\Repositories;

use App\Models\AutorizacionEmpleado;
use App\Repositories\BaseRepository;

/**
 * Class AutorizacionEmpleadoRepository
 * @package App\Repositories
 * @version November 26, 2019, 1:46 pm -05
*/

class AutorizacionEmpleadoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id_marcacion',
        'creado_by',
        'aprobado_by',
        'observacion',
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
        return AutorizacionEmpleado::class;
    }

    public function with($relations) {
        if (is_string($relations)) $relations = func_get_args();

        $this->with = $relations;

        return $this;
    }
}
