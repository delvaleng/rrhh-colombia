<?php

namespace App\Repositories;

use App\Models\Permiso;
use App\Repositories\BaseRepository;

/**
 * Class PermisoRepository
 * @package App\Repositories
 * @version September 22, 2019, 11:43 pm UTC
*/

class PermisoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'permiso',
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
        return Permiso::class;
    }
}
