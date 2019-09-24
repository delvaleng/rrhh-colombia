<?php

namespace App\Repositories;

use App\Models\TpDocumentoIdentidad;
use App\Repositories\BaseRepository;

/**
 * Class TpDocumentoIdentidadRepository
 * @package App\Repositories
 * @version September 23, 2019, 12:22 am UTC
*/

class TpDocumentoIdentidadRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'descripcion',
        'code',
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
        return TpDocumentoIdentidad::class;
    }
}
