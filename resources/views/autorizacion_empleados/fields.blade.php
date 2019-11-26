<!-- Id Marcacion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_marcacion', 'Id Marcacion:') !!}
    {!! Form::text('id_marcacion', null, ['class' => 'form-control']) !!}
</div>

<!-- Creado By Field -->
<div class="form-group col-sm-6">
    {!! Form::label('creado_by', 'Creado By:') !!}
    {!! Form::text('creado_by', null, ['class' => 'form-control']) !!}
</div>

<!-- Aprobado By Field -->
<div class="form-group col-sm-6">
    {!! Form::label('aprobado_by', 'Aprobado By:') !!}
    {!! Form::text('aprobado_by', null, ['class' => 'form-control']) !!}
</div>

<!-- Observacion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('observacion', 'Observacion:') !!}
    {!! Form::text('observacion', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('autorizacionEmpleados.index') !!}" class="btn btn-default">Cancel</a>
</div>
