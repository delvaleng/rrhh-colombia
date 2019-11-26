<!-- Id Marcacion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_marcacion', 'Empleado:') !!}
    <p>{!! ($autorizacionEmpleado->id_marcacion)? $autorizacionEmpleado->marcacion->empleado->nombre.' '.$autorizacionEmpleado->marcacion->empleado->apellido   : '-' !!}</p>
</div>
<!-- Id Marcacion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_marcacion', 'Dia:') !!}
    <p>{!! ($autorizacionEmpleado->id_marcacion)?  date('d-m-Y', strtotime($autorizacionEmpleado->marcacion->dia)): '-' !!}</p>
</div>

<!-- Id Marcacion Field -->
<div class="form-group col-sm-12">
    {!! Form::label('id_marcacion', 'Tipo de Marcacion:') !!}
    <p>{!! ($autorizacionEmpleado->id_marcacion)? $autorizacionEmpleado->marcacion->tpMarcacion->descripcion  : '-' !!}</p>
</div>


<!-- Creado By Field -->
<div class="form-group col-sm-6">
    {!! Form::label('creado_by', 'Creado Por:') !!}
    <p>{!! ($autorizacionEmpleado->creado_by)?  $autorizacionEmpleado->creadoBy->nombre.' '.$autorizacionEmpleado->creadoBy->apellido  : '-' !!}</p>
</div>

<!-- Aprobado By Field -->
<div class="form-group col-sm-6">
    {!! Form::label('aprobado_by', 'Aprobado By:') !!}
    <p>{!! ($autorizacionEmpleado->aprobado_by)?  $autorizacionEmpleado->aprobadoBy->nombre.' '.$autorizacionEmpleado->aprobadoBy->apellido  : '-' !!}</p>
</div>

<!-- Observacion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('observacion', 'Observacion:') !!}
    <p>{!! $autorizacionEmpleado->observacion !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('created_at', 'Creacion:') !!}
    <p>{!! $autorizacionEmpleado->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group col-sm-12">
    {!! Form::label('updated_at', 'Actualizado:') !!}
    <p>{!! $autorizacionEmpleado->updated_at !!}</p>
</div>
