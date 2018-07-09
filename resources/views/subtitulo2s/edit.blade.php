@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Subtitulo2
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($subtitulo2, ['route' => ['subtitulo2s.update', $subtitulo2->id], 'method' => 'patch']) !!}

                        @include('subtitulo2s.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection