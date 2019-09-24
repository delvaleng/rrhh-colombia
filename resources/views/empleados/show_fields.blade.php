<!-- Id Field -->
<!-- <div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $empleado->id !!}</p>
</div> -->
<div class="col-xs-12">
  <div class="row">
    <div class="col-xs-12 col-md-6">
      <!-- Nombre Field -->
      <div class="form-group">
          {!! Form::label('nombre', 'Nombre:') !!}
          <p>{!! $empleado->nombre !!}</p>
      </div>
    </div>

      <div class="col-xs-12 col-md-6">
      <!-- Apellido Field -->
      <div class="form-group">
          {!! Form::label('apellido', 'Apellido:') !!}
          <p>{!! $empleado->apellido !!}</p>
      </div>
    </div>
  </div>
</div>

<div class="col-xs-12">
  <div class="row">
    <div class="col-xs-12 col-md-6">
      <!-- Id Tp Documento Identidad Field -->
      <div class="form-group">
          {!! Form::label('id_tp_documento_identidad', 'Documento de Identidad:') !!}
          <p>{!! $empleado->tpDocumentIdent->code !!} - {!! $empleado->num_documento !!}</p>
      </div>
    </div>

      <div class="col-xs-12 col-md-6">
        <!-- Usuario Field -->
        <div class="form-group">
            {!! Form::label('usuario', 'Usuario:') !!}
            <p>{!! $empleado->usuario !!}</p>
        </div>
    </div>
  </div>
</div>

<div class="col-xs-12">
  <div class="row">
    <div class="col-xs-12 col-md-6">
      <!-- Status Field -->
      <div class="form-group">
          {!! Form::label('status', 'Estatus:') !!}
          <p>{!! ($empleado->status == 1)? 'ACTIVO' : 'INACTIVO' !!}</p>
      </div>
    </div>

      <div class="col-xs-12 col-md-6">
    </div>
  </div>
</div>

<div class="col-xs-12">
  <div class="row">
    <div class="col-xs-12 col-md-6">
      <!-- Creado Field -->
      <div class="form-group">
          {!! Form::label('created_at', 'Creado:') !!}
          <p>{!! $empleado->created_at !!}</p>
      </div>
    </div>

      <div class="col-xs-12 col-md-6">
        <!-- Actualizado Field -->
        <div class="form-group">
            {!! Form::label('updated_at', 'Actualizado:') !!}
            <p>{!! $empleado->updated_at !!}</p>
        </div>
    </div>
  </div>
</div>
