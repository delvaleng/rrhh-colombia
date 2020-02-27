<div class="table-responsive">
    <table class="stripe row-border order-column compact" id="horarios-table">
        <thead>
            <tr>
                <th>Acci&oacute;n</th>
                <th>Empleado</th>
                <th>Dia</th>
                <th>Entrada</th>
                <th>Salida</th>
            </tr>
        </thead>
        <tbody>
        @foreach($horarios as $horario)
            <tr>
                <td>
                  {!! Form::open(['route' => ['horarios.destroy', $horario->id], 'method' => 'delete']) !!}
                  <div class='btn-group'>
                    <a href="{!! route('horarios.show', [$horario->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('horarios.edit', [$horario->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                  </div>
                  {!! Form::close() !!}
                </td>
                <td>{!! $horario->horarioEmpleado[0]->nombre !!} {!! $horario->horarioEmpleado[0]->apellido  !!}</td>
                <td>{!! $horario->dia !!}</td>
                <td>{!! $horario->entrada !!}</td>
                <td>{!! $horario->salida !!}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
