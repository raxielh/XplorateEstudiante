<?php

namespace App\Repositories;

use App\Models\PosiblesRespuestas;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class PosiblesRespuestasRepository
 * @package App\Repositories
 * @version June 1, 2018, 2:49 am UTC
 *
 * @method PosiblesRespuestas findWithoutFail($id, $columns = ['*'])
 * @method PosiblesRespuestas find($id, $columns = ['*'])
 * @method PosiblesRespuestas first($columns = ['*'])
*/
class PosiblesRespuestasRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'descripcion',
        'pregunta',
        'orden',
        'valor'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return PosiblesRespuestas::class;
    }
}
