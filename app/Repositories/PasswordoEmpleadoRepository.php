<?php

namespace App\Repositories;

use App\Models\PasswordoEmpleado;
use App\Repositories\BaseRepository;

/**
 * Class PasswordoEmpleadoRepository
 * @package App\Repositories
 * @version September 23, 2019, 1:13 pm UTC
*/

class PasswordoEmpleadoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id_empleado',
        'password',
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
        return PasswordoEmpleado::class;
    }
    public function with($relations) {
        if (is_string($relations)) $relations = func_get_args();

        $this->with = $relations;

        return $this;
    }
}
