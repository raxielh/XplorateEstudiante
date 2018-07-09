@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Posibles Respuestas
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($posiblesRespuestas, ['route' => ['posiblesRespuestas.update', $posiblesRespuestas->id], 'method' => 'patch']) !!}

                        @include('posibles_respuestas.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection