@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Passwordo Empleado
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($passwordoEmpleado, ['route' => ['passwordoEmpleados.update', $passwordoEmpleado->id], 'method' => 'patch']) !!}

                        @include('passwordo_empleados.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection