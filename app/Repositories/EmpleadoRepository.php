<?php

namespace App\Repositories;

use App\Models\Empleado;
use App\Repositories\BaseRepository;

/**
 * Class EmpleadoRepository
 * @package App\Repositories
 * @version September 23, 2019, 12:28 am UTC
*/

class EmpleadoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id_tp_documento_identidad',
        'id_pais',
        'nombre',
        'apellido',
        'num_documento',
        'usuario',
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
        return Empleado::class;
    }
    public function with($relations) {
        if (is_string($relations)) $relations = func_get_args();

        $this->with = $relations;

        return $this;
    }
}
