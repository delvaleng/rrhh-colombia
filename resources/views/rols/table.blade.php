<div class="table-responsive">
    <table class="stripe row-border order-column compact" id="rols-table">
        <thead>
            <tr>
              <th>Acci&oacute;n</th>
              <th>Rol</th>
            </tr>
        </thead>
        <tbody>
        @foreach($rols as $rol)
            <tr>
                <td>
                    {!! Form::open(['route' => ['rols.destroy', $rol->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('rols.show', [$rol->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('rols.edit', [$rol->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
                <td>{!! $rol->rol !!}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
