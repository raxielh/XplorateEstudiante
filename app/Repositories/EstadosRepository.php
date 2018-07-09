<?php

namespace App\Repositories;

use App\Models\Estados;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class EstadosRepository
 * @package App\Repositories
 * @version June 1, 2018, 1:10 am UTC
 *
 * @method Estados findWithoutFail($id, $columns = ['*'])
 * @method Estados find($id, $columns = ['*'])
 * @method Estados first($columns = ['*'])
*/
class EstadosRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Estados::class;
    }
}
