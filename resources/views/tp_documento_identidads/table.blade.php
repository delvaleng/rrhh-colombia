<div class="table-responsive">
    <table class="table" id="tpDocumentoIdentidads-table">
        <thead>
            <tr>
                <th>Descripcion</th>
        <th>Code</th>
                <th colspan="3">Accion</th>
            </tr>
        </thead>
        <tbody>
        @foreach($tpDocumentoIdentidads as $tpDocumentoIdentidad)
            <tr>
                <td>{!! $tpDocumentoIdentidad->descripcion !!}</td>
            <td>{!! $tpDocumentoIdentidad->code !!}</td>
                <td>
                    {!! Form::open(['route' => ['tpDocumentoIdentidads.destroy', $tpDocumentoIdentidad->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('tpDocumentoIdentidads.show', [$tpDocumentoIdentidad->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('tpDocumentoIdentidads.edit', [$tpDocumentoIdentidad->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
