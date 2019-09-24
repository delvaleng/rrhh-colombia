<div class="table-responsive">
    <table class="table" id="permisos-table">
        <thead>
            <tr>
                <th>Permiso</th>
                <th colspan="3">Accion</th>
            </tr>
        </thead>
        <tbody>
        @foreach($permisos as $permiso)
            <tr>
                <td>{!! $permiso->permiso !!}</td>
                <td>
                    {!! Form::open(['route' => ['permisos.destroy', $permiso->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('permisos.show', [$permiso->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('permisos.edit', [$permiso->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
