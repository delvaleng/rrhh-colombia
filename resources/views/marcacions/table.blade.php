
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
              @if (  auth()->user()->id == 3 ||  auth()->user()->id == 1 ||  auth()->user()->id == 2)
              <th>Ver Mapa</th>
              @endif

              <!-- <th>Coordenadas</th> -->
            </tr>
        </thead>
        <tbody>
        @foreach($marcacions as $marcacion)
            <tr>
              <td>{!! $marcacion->id !!}</td>
              <td><a class="modalPermiso" data-id="{!! $marcacion->id !!}"><i class="fa fa-star-o"></i></a>
              </td>

              <!-- <td>{!! $marcacion->empleado->nombre !!} - {!! $marcacion->empleado->apellido !!}</td> -->
              <td>{!! strtoupper($marcacion->empleado->usuario) !!} </td>

              <td>{!! $marcacion->tpMarcacion->descripcion !!}</td>
              <td>{!! date('d-m-Y', strtotime($marcacion->dia));  !!}</td>
              <td>{!! $marcacion->hora_inicio !!}</td>
              <td>{!! $marcacion->hora_fin !!}</td>
              <td>{!! $marcacion->total_min !!}</td>
              <td>{!! $marcacion->observacion !!}</td>
              @if (  auth()->user()->id == 3 ||  auth()->user()->id == 1 ||  auth()->user()->id == 2)

                @if ($marcacion->longitud && $marcacion->latitud)
                  <td><a class="gpsUbicacion"
                    data-lat  = "{!! $marcacion->latitud !!}"
                    data-long = "{!! $marcacion->longitud !!}"
                    ><i class="fa fa-map-pin"></i></a></td>
                @else
                <td>UBICACION DESCONOCIDA</td>
                @endif
              @endif

              <!-- <td>{!! $marcacion->latitud !!} - {!! $marcacion->longitud !!}</td> -->
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
