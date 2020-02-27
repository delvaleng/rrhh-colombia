<div class="table-responsive">
    <table class="stripe row-border order-column compact" id="horarioUsers-table">
        <thead>
            <tr>
                <th>Acci&oacute;n</th>
                <th>Empleado</th>
              </tr>
        </thead>
        <tbody>
        @foreach($horarioUsers as $horarioUser)
            <tr>
              <td>
                {!! Form::open(['route' => ['horarioUsers.destroy', $horarioUser->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                  <a href="{!! route('horarioUsers.show', [$horarioUser->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                  <a href="{!! route('horarioUsers.edit', [$horarioUser->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                  {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
              </td>
              <td>{!! $horarioUser->empleado->nombre !!} {!! $horarioUser->empleado->apellido  !!}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
