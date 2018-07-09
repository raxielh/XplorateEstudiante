<?php

namespace App\Repositories;

use App\Models\Subtitulo2;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class Subtitulo2Repository
 * @package App\Repositories
 * @version June 4, 2018, 10:44 pm UTC
 *
 * @method Subtitulo2 findWithoutFail($id, $columns = ['*'])
 * @method Subtitulo2 find($id, $columns = ['*'])
 * @method Subtitulo2 first($columns = ['*'])
*/
class Subtitulo2Repository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'idsubtitulo2',
        'pregunta',
        'variable'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Subtitulo2::class;
    }
}
