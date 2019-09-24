<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $permiso->id !!}</p>
</div>

<!-- Permiso Field -->
<div class="form-group">
    {!! Form::label('permiso', 'Permiso:') !!}
    <p>{!! $permiso->permiso !!}</p>
</div>

<!-- Status Field -->
<div class="form-group">
    {!! Form::label('status', 'Status:') !!}
    <p>{!! $permiso->status !!}</p>
</div>

<!-- Creado Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Creado:') !!}
    <p>{!! $permiso->created_at !!}</p>
</div>

<!-- Actualizado Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Actualizado:') !!}
    <p>{!! $permiso->updated_at !!}</p>
</div>

