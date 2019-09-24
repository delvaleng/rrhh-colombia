<?php

namespace App\Repositories;

use App\Models\Pais;
use App\Repositories\BaseRepository;

/**
 * Class PaisRepository
 * @package App\Repositories
 * @version September 23, 2019, 12:24 am UTC
*/

class PaisRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'country',
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
        return Pais::class;
    }
}
