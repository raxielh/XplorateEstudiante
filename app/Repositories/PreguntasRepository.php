<?php

namespace App\Repositories;

use App\Models\Preguntas;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class PreguntasRepository
 * @package App\Repositories
 * @version June 1, 2018, 1:41 am UTC
 *
 * @method Preguntas findWithoutFail($id, $columns = ['*'])
 * @method Preguntas find($id, $columns = ['*'])
 * @method Preguntas first($columns = ['*'])
*/
class PreguntasRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'descripcion',
        'estado',
        'orden',
        'categoria'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Preguntas::class;
    }
}
