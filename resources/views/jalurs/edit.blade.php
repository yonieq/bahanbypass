@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Jalur
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($jalur, ['route' => ['jalurs.update', $jalur->id], 'method' => 'patch', 'files' => true]) !!}

                        @include('jalurs.edit_field')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection