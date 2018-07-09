<?php

namespace App\Models;

use Eloquent as Model;


/**
 * Class Subtitulo2
 * @package App\Models
 * @version June 4, 2018, 10:44 pm UTC
 *
 * @property integer idsubtitulo2
 * @property integer pregunta
 * @property char variable
 */
class Subtitulo2 extends Model
{
    

    public $table = 'subtitulo2';
    

    


    public $fillable = [
        'idsubtitulo2',
        'pregunta',
        'variable'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'idsubtitulo2' => 'integer',
        'pregunta' => 'integer',
        'variable' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'idsubtitulo2' => 'required',
        'pregunta' => 'required',
        'variable' => 'required'
    ];

    
}
