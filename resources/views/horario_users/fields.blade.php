<!-- Id Empleado Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_empleado', 'Id Empleado:') !!}
    {!! Form::select('id_empleado', $empleado, null,['id'=>'id_empleado', 'class'=>'form-control select2', 'style'=>'width: 100%'] ) !!}
</div>


<!-- Dia Field -->
<div class="form-group col-sm-6">
    {!! Form::label('dia', 'Dia(s):') !!}
    {!! Form::select('dia[]', $dias, null,['id'=>'dia', 'class'=>'form-control select2',  'multiple'=>'multiple', 'style'=>'width: 100%'] ) !!}
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
    <a href="{!! route('horarioUsers.index') !!}" class="btn btn-default">Cancelar</a>
</div>
