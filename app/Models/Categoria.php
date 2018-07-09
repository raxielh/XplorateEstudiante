<?php

namespace App\Models;

use Eloquent as Model;


/**
 * Class Categoria
 * @package App\Models
 * @version June 1, 2018, 1:37 am UTC
 *
 * @property char titulo
 * @property char desc
 * @property integer orden
 */
class Categoria extends Model
{
    

    public $table = 'categoria';
    

    


    public $fillable = [
        'titulo',
        'desc',
        'orden'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'titulo' => 'string',
        'desc' => 'string',
        'orden' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'titulo' => 'required'
    ];

    
}
