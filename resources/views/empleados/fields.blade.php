<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', 'Nombres:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
</div>

<!-- Apellido Field -->
<div class="form-group col-sm-6">
    {!! Form::label('apellido', 'Apellidos:') !!}
    {!! Form::text('apellido', null, ['class' => 'form-control']) !!}
</div>

<!-- Id Tp Document Ident Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_tp_documento_identidad', 'Tipo de Documento:') !!}
    {!! Form::select('id_tp_documento_identidad', $tpdocumentident, null,['id'=>'id_tp_document_ident', 'class'=>'form-control select2', 'style'=>'width: 100%'] ) !!}
    <!-- {!! Form::text('id_tp_document_ident', null, ['class' => 'form-control']) !!} -->
</div>

<!-- Num Documento Field -->
<div class="form-group col-sm-6">
    {!! Form::label('num_documento', 'N° Documento:') !!}
    {!! Form::text('num_documento', null, ['class' => 'form-control']) !!}
</div>

<!-- Usuario Field -->
<div class="form-group col-sm-6">
    {!! Form::label('usuario', 'Usuario:') !!}
    {!! Form::text('usuario', null, ['class' => 'form-control']) !!}
</div>

<!-- Id Country Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_pais', 'Pais:') !!}
    {!! Form::select('id_pais', $pais, null,['id'=>'id_pais', 'class'=>'form-control select2', 'style'=>'width: 100%'] ) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('empleados.index') !!}" class="btn btn-default">Cancel</a>
</div>
