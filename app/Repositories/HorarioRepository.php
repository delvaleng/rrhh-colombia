<?php

namespace App\Repositories;

use App\Models\Horario;
use App\Repositories\BaseRepository;

/**
 * Class HorarioRepository
 * @package App\Repositories
 * @version November 26, 2019, 7:54 am -05
*/

class HorarioRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'dia',
        'entrada',
        'salida',
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
        return Horario::class;
    }
}
