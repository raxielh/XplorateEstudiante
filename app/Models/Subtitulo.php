<?php

namespace App\Models;

use Eloquent as Model;


/**
 * Class Subtitulo
 * @package App\Models
 * @version June 4, 2018, 10:39 pm UTC
 *
 * @property char descsubtitulo1
 */
class Subtitulo extends Model
{
    

    public $table = 'subtitulo';
    

    


    public $fillable = [
        'descsubtitulo1'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'descsubtitulo1' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'descsubtitulo1' => 'required'
    ];

    
}
