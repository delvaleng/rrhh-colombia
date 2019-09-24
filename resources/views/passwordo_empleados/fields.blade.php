<!-- Id Empleado Field -->
<div class="form-group col-sm-6">
  {!! Form::label('id_empleado', 'Empleado:') !!}
  {!! Form::select('id_empleado', $empleado, null,['id'=>'id_empleado', 'class'=>'form-control select2', 'style'=>'width: 100%'] ) !!}
</div>

<!-- Password Field -->
<div class="form-group col-sm-6">
    {!! Form::label('password', 'Password:') !!}
    {!! Form::password('password', ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('passwordoEmpleados.index') !!}" class="btn btn-default">Cancel</a>
</div>
