<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Response;
use Illuminate\Support\Facades\DB;


class ConsultaController extends AppBaseController
{
    public function marcas()
    {
        header('Access-Control-Allow-Origin: *');
        return DB::table('marcas')->get();
    } 

    public function lineas(Request $request)
    {
        header('Access-Control-Allow-Origin: *');
        $marca_id=$request->marca;
        return DB::table('lineas')
                        ->where('marca_id',$marca_id)
                        ->get();
    }    


}
