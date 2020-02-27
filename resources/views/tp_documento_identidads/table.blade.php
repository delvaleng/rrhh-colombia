<div class="table-responsive">
    <table class="stripe row-border order-column compact" id="tpDocumentoIdentidads-table">
        <thead>
            <tr>
              <th>Acci&oacute;n</th>
              <th>Descripcion</th>
              <th>Code</th>
            </tr>
        </thead>
        <tbody>
        @foreach($tpDocumentoIdentidads as $tpDocumentoIdentidad)
            <tr>
              <td>
                {!! Form::open(['route' => ['tpDocumentoIdentidads.destroy', $tpDocumentoIdentidad->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                  <a href="{!! route('tpDocumentoIdentidads.show', [$tpDocumentoIdentidad->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                  <a href="{!! route('tpDocumentoIdentidads.edit', [$tpDocumentoIdentidad->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                  {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
              </td>
              <td>{!! $tpDocumentoIdentidad->descripcion !!}</td>
              <td>{!! $tpDocumentoIdentidad->code !!}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
