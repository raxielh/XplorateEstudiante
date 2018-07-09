@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Preguntas
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($preguntas, ['route' => ['preguntas.update', $preguntas->id], 'method' => 'patch']) !!}

                        @include('preguntas.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection