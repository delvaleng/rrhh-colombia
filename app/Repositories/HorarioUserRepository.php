<?php

namespace App\Repositories;

use App\Models\HorarioUser;
use App\Repositories\BaseRepository;

/**
 * Class HorarioUserRepository
 * @package App\Repositories
 * @version February 27, 2020, 10:36 am -05
*/

class HorarioUserRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id_empleado',
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
        return HorarioUser::class;
    }
    
    public function with($relations) {
        if (is_string($relations)) $relations = func_get_args();

        $this->with = $relations;

        return $this;
    }
}
