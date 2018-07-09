<?php

namespace App\Models;

use Eloquent as Model;


/**
 * Class PosiblesRespuestas
 * @package App\Models
 * @version June 1, 2018, 2:49 am UTC
 *
 * @property char descripcion
 * @property integer pregunta
 * @property integer orden
 * @property integer valor
 */
class PosiblesRespuestas extends Model
{
    

    public $table = 'posibles_respuestas';
    

    


    public $fillable = [
        'descripcion',
        'pregunta',
        'orden',
        'valor'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'descripcion' => 'string',
        'pregunta' => 'integer',
        'orden' => 'integer',
        'valor' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'descripcion' => 'required',
        'pregunta' => 'required',
        'orden' => 'required',
        'valor' => 'required'
    ];

    
}
