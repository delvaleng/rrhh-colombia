<!-- Permiso Field -->
<div class="form-group col-sm-6">
    {!! Form::label('permiso', 'Permiso:') !!}
    {!! Form::text('permiso', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('permisos.index') !!}" class="btn btn-default">Cancel</a>
</div>
