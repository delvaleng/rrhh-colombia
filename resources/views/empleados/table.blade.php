@section('css')
<link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.3.1/css/buttons.bootstrap.min.css">
@endsection
<div class="table-responsive">
    <table id="empleados-table" class="display compact" width="100%">
        <thead>
            <tr>
              <th>Codigo</th>
              <th>Nombre</th>
              <th>Apellido</th>
              <th>Pais</th>
              <th>Documento de Identidad</th>
              <th>Usuario</th>
              <th>Ver</th>
              <th>Editar</th>
              <th>Eliminar</th>

            </tr>
        </thead>
        <tbody>
        @foreach($empleados as $empleado)
            <tr>
              <td>{!! $empleado->id !!}</td>
              <td>{!! $empleado->nombre !!}</td>
              <td>{!! $empleado->apellido !!}</td>
              <td>{!! $empleado->paisEmpleado->country !!}</td>
              <td>{!! $empleado->tpDocumentIdent->code !!} - {!! $empleado->num_documento !!}</td>
              <td>{!! $empleado->usuario !!}</td>
              <td>
                <a href="{!! route('empleados.show', [$empleado->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
              </td>
              <td>
                <a href="{!! route('empleados.edit', [$empleado->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
              </td>
              <td>
                  {!! Form::open(['route' => ['empleados.destroy', $empleado->id], 'method' => 'delete']) !!}
                  <div class='btn-group'>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                  </div>
                  {!! Form::close() !!}
              </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@section('scripts')

<!-- Datatables -->
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.3.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.3.1/js/buttons.bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.3.1/js/buttons.colVis.min.js"></script>
<script src="{{ asset('vendor/datatables/buttons.server-side.js') }}"></script>
<script src="{{ asset('js/empleados/index.js')}} "></script>
@endsection
