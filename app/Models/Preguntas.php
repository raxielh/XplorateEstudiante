<?php

namespace App\Models;

use Eloquent as Model;


/**
 * Class Preguntas
 * @package App\Models
 * @version June 1, 2018, 1:41 am UTC
 *
 * @property char descripcion
 * @property integer estado
 * @property integer orden
 * @property integer categoria
 */
class Preguntas extends Model
{
    

    public $table = 'preguntas';
    

    


    public $fillable = [
        'descripcion',
        'estado',
        'orden',
        'categoria'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'descripcion' => 'string',
        'estado' => 'integer',
        'orden' => 'integer',
        'categoria' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'descripcion' => 'required',
        'estado' => 'required',
        'orden' => 'required',
        'categoria' => 'required'
    ];

    
}
