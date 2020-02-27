@if($horario != null)
<!-- Id Field -->
<div class="form-group col-sm-12" align="center">
    {!! Form::label('id', 'Empleado:') !!}
    <p>{!! $horario->horarioEmpleado[0]->nombre !!} {!! $horario->horarioEmpleado[0]->apellido  !!}</p>
</div>
@endif

<!-- Dia Field -->
<div class="form-group col-sm-6">
    {!! Form::label('dia', 'Dia:') !!}
    {!! Form::text('dia', null, ['class' => 'form-control']) !!}
</div>
<!-- Dia Field -->
<div class="form-group col-sm-6">
    {!! Form::label('entrada', 'Entrada:') !!}
    {!! Form::time('entrada', null, ['class' => 'form-control']) !!}
</div>
<!-- Dia Field -->
<div class="form-group col-sm-6">
    {!! Form::label('salida', 'Salida:') !!}
    {!! Form::time('salida', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    @if($horario != null)
      <a href="{!! route('horarioUsers.show', [$horario->id_horario_user]) !!}" class="btn btn-default">Cancelar</a>
    @else
      <a href="{!! route('horarioUsers.index') !!}" class="btn btn-default">Cancelar</a>
    @endif
</div>
