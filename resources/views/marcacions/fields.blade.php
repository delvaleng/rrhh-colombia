<!-- Id Empleado Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_empleado', 'Id Empleado:') !!}
    {!! Form::text('id_empleado', null, ['class' => 'form-control']) !!}
</div>

<!-- Id Tp Marcacion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_tp_marcacion', 'Id Tp Marcacion:') !!}
    {!! Form::text('id_tp_marcacion', null, ['class' => 'form-control']) !!}
</div>

<!-- Dia Field -->
<div class="form-group col-sm-6">
    {!! Form::label('dia', 'Dia:') !!}
    {!! Form::text('dia', null, ['class' => 'form-control']) !!}
</div>

<!-- Total Min Field -->
<div class="form-group col-sm-6">
    {!! Form::label('total_min', 'Total Min:') !!}
    {!! Form::text('total_min', null, ['class' => 'form-control']) !!}
</div>

<!-- Latitud Field -->
<div class="form-group col-sm-6">
    {!! Form::label('latitud', 'Latitud:') !!}
    {!! Form::text('latitud', null, ['class' => 'form-control']) !!}
</div>

<!-- Longitud Field -->
<div class="form-group col-sm-6">
    {!! Form::label('longitud', 'Longitud:') !!}
    {!! Form::text('longitud', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('marcacions.index') !!}" class="btn btn-default">Cancel</a>
</div>
