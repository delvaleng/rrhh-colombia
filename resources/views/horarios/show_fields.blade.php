<!-- Id Field -->
<div class="form-group col-sm-12" align="center">
    {!! Form::label('id', 'Empleado:') !!}
    <p>{!! $horario->horarioEmpleado[0]->nombre !!} {!! $horario->horarioEmpleado[0]->apellido  !!}</p>
</div>

<!-- Dia Field -->
<div class="form-group col-sm-4">
    {!! Form::label('dia', 'Dia:') !!}
    <p>{!! $horario->dia !!}</p>
</div>

<!-- Entrada Field -->
<div class="form-group col-sm-4">
    {!! Form::label('entrada', 'Entrada:') !!}
    <p>{!! $horario->entrada !!}</p>
</div>

<!-- Salida Field -->
<div class="form-group col-sm-4">
    {!! Form::label('salida', 'Salida:') !!}
    <p>{!! $horario->salida !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group col-sm-4">
    {!! Form::label('created_at', 'Creado:') !!}
    <p>{!! $horario->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group col-sm-4">
    {!! Form::label('updated_at', 'Actualizado:') !!}
    <p>{!! $horario->updated_at !!}</p>
</div>

<div class="form-group col-sm-4">
</div>
<div class="form-group col-sm-4">
</div>
