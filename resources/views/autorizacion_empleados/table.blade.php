<div class="table-responsive">
  <table id="autorizacionEmpleados-table" class="display compact" width="100%">
        <thead>
            <tr>
                <th>Acci&oacute;n</th>
                <th>Empleado</th>
                <th>Dia</th>
                <th>Tipo de Marcacion</th>
                <th>Creado</th>
                <th>Aprobado</th>
                <th>Observacion</th>
            </tr>
        </thead>
        <tbody>
        @foreach($autorizacionEmpleados as $autorizacionEmpleado)
            <tr>

            <td>
              <div class='btn-group'>
                <a href="{!! route('autorizacionEmpleados.show', [$autorizacionEmpleado->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
              </div>
              {!! Form::close() !!}
            </td>
            <td>{!! ($autorizacionEmpleado->id_marcacion)? $autorizacionEmpleado->marcacion->empleado->nombre.' '.$autorizacionEmpleado->marcacion->empleado->apellido   : '-' !!}</td>
            <td>{!! ($autorizacionEmpleado->id_marcacion)?  date('d-m-Y', strtotime($autorizacionEmpleado->marcacion->dia)): '-' !!}</td>
            <td>{!! ($autorizacionEmpleado->id_marcacion)? $autorizacionEmpleado->marcacion->tpMarcacion->descripcion  : '-' !!}</td>

            <td>{!! ($autorizacionEmpleado->creado_by)?  $autorizacionEmpleado->creadoBy->nombre.' '.$autorizacionEmpleado->creadoBy->apellido  : '-' !!}</td>
            <td>{!! ($autorizacionEmpleado->aprobado_by)?  $autorizacionEmpleado->aprobadoBy->nombre.' '.$autorizacionEmpleado->aprobadoBy->apellido  : '-' !!}</td>
            <td>{!! $autorizacionEmpleado->observacion !!}</td>
            </tr>
        @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>Empleado</th>
                <th>Dia</th>
                <th>Tipo de Marcacion</th>
                <th>Creado</th>
                <th>Aprobado</th>
                <th>Observacion</th>
                <th>Acion</th>
            </tr>
        </tfoot>
    </table>
</div>
