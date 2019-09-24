<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $passwordoEmpleado->id !!}</p>
</div>

<!-- Id Empleado Field -->
<div class="form-group">
    {!! Form::label('id_empleado', 'Id Empleado:') !!}
    <p>{!! $passwordoEmpleado->id_empleado !!}</p>
</div>

<!-- Password Field -->
<div class="form-group">
    {!! Form::label('password', 'Password:') !!}
    <p>{!! $passwordoEmpleado->password !!}</p>
</div>

<!-- Status Field -->
<div class="form-group">
    {!! Form::label('status', 'Status:') !!}
    <p>{!! $passwordoEmpleado->status !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $passwordoEmpleado->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $passwordoEmpleado->updated_at !!}</p>
</div>

