
<div class="table-responsive">
    <table id="marcacions-table" class="display compact" width="100%">
        <thead>
            <tr>
              <th>N°</th>
              <th>(+)Permiso</th>
              <th>Empleado</th>
              <th>Tipo de Marcacion</th>
              <th>Dia</th>
              <th>Hora Inicio</th>
              <th>Hora Fin</th>
              <th>Total Min</th>
              <th>Observaciones</th>

              <!-- <th>Coordenadas</th> -->
            </tr>
        </thead>
        <tbody>
        @foreach($marcacions as $marcacion)
            <tr>
              <td>{!! $marcacion->id !!}</td>
              <td><a class="btn btn-primary btn-sm modalPermiso" data-id="{!! $marcacion->id !!}"><i class="fa fa-star-o"></i></a>
              </td>

              <!-- <td>{!! $marcacion->empleado->nombre !!} - {!! $marcacion->empleado->apellido !!}</td> -->
              <td>{!! strtoupper($marcacion->empleado->usuario) !!} </td>

              <td>{!! $marcacion->tpMarcacion->descripcion !!}</td>
              <td>{!! date('d-m-Y', strtotime($marcacion->dia));  !!}</td>
              <td>{!! $marcacion->hora_inicio !!}</td>
              <td>{!! $marcacion->hora_fin !!}</td>
              <td>{!! $marcacion->total_min !!}</td>
              <td>{!! $marcacion->observacion !!}</td>

              <!-- <td>{!! $marcacion->latitud !!} - {!! $marcacion->longitud !!}</td> -->
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
