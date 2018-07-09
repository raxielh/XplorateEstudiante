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
class Persona extends Model
{
    

    public $table = 'persona';
    

    


    public $fillable = [
          'idpersona',
          'nombre',
          'apellido',
          'cedula',
          'pass',
          'edad',
          'genero',
          'estado_civil',
          'raza_etnicidad',
          'lugar_nacimiento',
          'estado',
          'correo'
    ];


    
}
