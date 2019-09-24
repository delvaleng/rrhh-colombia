<!-- Id Field -->
<!-- <div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $pais->id !!}</p>
</div> -->

<!-- Pais Field -->
<div class="form-group">
    {!! Form::label('Pais', 'Pais:') !!}
    <p>{!! $pais->country !!}</p>
</div>

<!-- Status Field -->
<div class="form-group">
    {!! Form::label('status', 'Estatus:') !!}
    <p>{!! $pais->status !!}</p>
</div>

<!-- Creado Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Creado:') !!}
    <p>{!! $pais->created_at !!}</p>
</div>

<!-- Actualizado Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Actualizado:') !!}
    <p>{!! $pais->updated_at !!}</p>
</div>
