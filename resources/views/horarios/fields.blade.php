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
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('horarios.index') !!}" class="btn btn-default">Cancel</a>
</div>
