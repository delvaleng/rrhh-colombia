<!-- Pais Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Pais', 'Pais:') !!}
    {!! Form::text('country', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('pais.index') !!}" class="btn btn-default">Cancelar</a>
</div>
