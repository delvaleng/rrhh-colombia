{!! Form::hidden('id_marcacion', null, ['id'=>'id_marcacion', 'class' => 'form-control']) !!}

<!-- Creado By Field -->
<div class="form-group col-sm-6">
    {!! Form::label('creado_by', 'Creado:') !!}
    {!! Form::select('creado_by', $tpempleado, null,['id'=>'creado_by', 'placeholder' => 'Seleccione...', 'class'=>'form-control select2', 'style'=>'width: 100%'] ) !!}
</div>

<!-- Aprobado By Field -->
<div class="form-group col-sm-6">
    {!! Form::label('aprobado_by', 'Aprobado:') !!}
    {!! Form::select('aprobado_by', $tpempleado, null,['id'=>'aprobado_by', 'placeholder' => 'Seleccione...', 'class'=>'form-control select2', 'style'=>'width: 100%'] ) !!}
</div>

<!-- Observacion Field -->
<div class="form-group col-sm-12">
    {!! Form::label('observacion', 'Observaciones:') !!}
    {!! Form::textarea('observacion', null, ['id'=>'observacion', 'class' => 'form-control',  'rows' => 4, 'cols' => 54,]) !!}
</div>
