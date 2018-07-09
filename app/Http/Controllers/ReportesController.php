<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Persona;
use Session;
use Flash;
use Exception;

class ReportesController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function v_generar_rd()
    {
        return view('reportes.generar_rd');
    }

    public function generar_rd(Request $request)
    {
        return $request;
    }

    public function vista_cht()
    {
        return view('reportes.vista_cht');
    }

    public function generar_cht(Request $request)
    {
        return $request;
    }

}
