@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Perlengkapan
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($perlengkapan, ['route' => ['perlengkapans.update', $perlengkapan->id], 'method' => 'patch', 'files' => true]) !!}

                        @include('perlengkapans.edit_field')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection