@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Souvenir</h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                <form action="/souvenir_b" method="post">
                            @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <label for="documento">Documento:</label>
                            <input type="number" required name="documento" class="form-control" placeholder="Documento">
                        </div>
                        <div class="col-md-3">
                            <input type="submit" value="Buscar" style="margin-top: 24px" class="btn btn-success">
                        </div>
                    </div>
                </form>              
            </div>
        </div>
        <div class="text-center">
        
        </div>
    </div>
@endsection