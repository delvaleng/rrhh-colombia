<div class="table-responsive">
    <table class="stripe row-border order-column compact" id="pais-table">
        <thead>
            <tr>
              <th>Acion</th>
              <th>Pais</th>
            </tr>
        </thead>
        <tbody>
        @foreach($pais as $pais)
            <tr>
              <td>
                {!! Form::open(['route' => ['pais.destroy', $pais->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                  <a href="{!! route('pais.show', [$pais->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                  <a href="{!! route('pais.edit', [$pais->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                  {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
              </td>
              <td>{!! $pais->country !!}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
