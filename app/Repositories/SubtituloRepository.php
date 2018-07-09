<?php

namespace App\Repositories;

use App\Models\Subtitulo;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class SubtituloRepository
 * @package App\Repositories
 * @version June 4, 2018, 10:39 pm UTC
 *
 * @method Subtitulo findWithoutFail($id, $columns = ['*'])
 * @method Subtitulo find($id, $columns = ['*'])
 * @method Subtitulo first($columns = ['*'])
*/
class SubtituloRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'descsubtitulo1'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Subtitulo::class;
    }
}
