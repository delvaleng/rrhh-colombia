<?php

namespace App\Repositories;

use App\Models\TpMarcacion;
use App\Repositories\BaseRepository;

/**
 * Class TpMarcacionRepository
 * @package App\Repositories
 * @version September 22, 2019, 11:46 pm UTC
*/

class TpMarcacionRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'descripcion',
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
        return TpMarcacion::class;
    }
}
