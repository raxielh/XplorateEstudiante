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
class Respuestas extends Model
{
    

    public $table = 'respuestas';
    

    


    public $fillable = [
        'tiempo',
        'persona',
        'posibles_respuestas',
        'pregunta'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'tiempo' => 'string',
        'persona' => 'integer',
        'posibles_respuestas' => 'integer',
        'pregunta' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'persona' => 'required',
        'posibles_respuestas' => 'required',
        'pregunta' => 'required'
    ];

    
}
