<?php

namespace App\Models;

use Eloquent as Model;


/**
 * Class Estados
 * @package App\Models
 * @version June 1, 2018, 1:10 am UTC
 *
 * @property char descripcion
 */
class Estados extends Model
{
    

    public $table = 'estados';
    

    


    public $fillable = [
        'nombre'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nombre' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre' => 'required'
    ];

    
}
