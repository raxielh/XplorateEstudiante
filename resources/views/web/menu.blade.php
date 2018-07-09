@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Web Page</h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-3" style="text-align: center;font-size: 18px;padding: 1em">
                        Menu <br><a href="/adm_menu" class="btn btn-info">Ver</a>
                    </div>
                    <div class="col-md-3" style="text-align: center;font-size: 18px;padding: 1em">
                        Pagina Bienvenido <br><a href="#" class="btn btn-info">Ver</a>
                    </div>
                    <div class="col-md-3" style="text-align: center;font-size: 18px;padding: 1em">
                        Pagina FAQ <br><a href="#" class="btn btn-info">Ver</a>
                    </div>
                    <div class="col-md-3" style="text-align: center;font-size: 18px;padding: 1em">
                        Pagina TEST <br><a href="#" class="btn btn-info">Ver</a>
                    </div>
                    <div class="col-md-3" style="text-align: center;font-size: 18px;padding: 1em">
                        Pagina Contacto <br><a href="#" class="btn btn-info">Ver</a>
                    </div>
                </div>   
            </div>
        </div>
        <div class="text-center">
        
        </div>
    </div>
@endsection

