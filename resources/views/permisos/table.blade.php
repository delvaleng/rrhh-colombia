<div class="table-responsive">
    <table class="stripe row-border order-column compact" id="permisos-table">
        <thead>
            <tr>
              <th>Acci&oacute;n</th>
              <th>Permiso</th>
            </tr>
        </thead>
        <tbody>
        @foreach($permisos as $permiso)
            <tr>
              <td>
                {!! Form::open(['route' => ['permisos.destroy', $permiso->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                  <a href="{!! route('permisos.show', [$permiso->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                  <a href="{!! route('permisos.edit', [$permiso->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                  {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
              </td>
              <td>{!! $permiso->permiso !!}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
