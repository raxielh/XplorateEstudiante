@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Cuantos Hicieron el Test</h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                <form action="/generar_cht" method="post">
                            @csrf
                    <div class="row">
                        <div class="col-md-3">
                            <label for="fi">Fecha Inicio:</label>
                            <input type="date" required name="fi" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <label for="ff">Fecha Final:</label>
                            <input type="date" required name="ff" class="form-control">                            
                        </div>
                        <div class="col-md-3">
                            <label for="ff">Campus:</label>
 <select name="s_campus" class="form-control" id="s_campus">
                                    <option value="BOGT">
                    Bogotá                  </option>
                                    <option value="CARTG">
                    Campus Cartagena                  </option>
                                    <option value="MONTR" selected="selected">
                    Campus Montería                  </option>
                                    <option value="CECOV">
                    Ceres Coveñas                  </option>
                                    <option value="CESAN">
                    Ceres San Andres de Sotavento                  </option>
                                    <option value="CETIE">
                    Ceres Tierralta                  </option>
                                    <option value="CETUC">
                    Ceres Tuchin                  </option>
                                    <option value="CEVAL">
                    Ceres Valencía                  </option>
                                  </select>                         
                        </div>
                        <div class="col-md-3">
                            <input type="submit" value="Generar" style="margin-top: 24px" class="btn btn-success">
                        </div>
                    </div>

                    
                </form>

            </div>
        </div>
        <div class="text-center">
        
        </div>
    </div>
@endsection

