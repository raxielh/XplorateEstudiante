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
                
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Fecha Test</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($buscar as $buscar)
                    <tr>
                      <th scope="row">{{ $buscar->persona }} </th>
                      <td>{{ $buscar->fechaencuesta }} </td>
                      <td>
               <form action="/entregar" method="post">
                            @csrf
                    
                            <input type="hidden" required name="persona" value="{{ $buscar->persona }}">
                            <input type="hidden" required name="respuestas_historic_1" value="{{ $buscar->respuestas_historic_1 }}">
                            <input type="submit" value="Entregar" class="btn btn-success">
                </form> </td>
                    </tr>
                    @endforeach  
                  </tbody>
                </table>
                         
            </div>
        </div>
        <div class="text-center">
        
        </div>
    </div>
@endsection