<div class="table-responsive">
    <table class="table" id="passwordoEmpleados-table">
        <thead>
            <tr>
                <th>Empleado</th>
                <th>Password</th>
                <th>Estatus</th>

                <th colspan="3">Acion</th>
            </tr>
        </thead>
        <tbody>
        @foreach($passwordoEmpleados as $passwordoEmpleado)
            <tr>
                <td>{!! $passwordoEmpleado->empleado->nombre !!} {!! $passwordoEmpleado->empleado->apellido  !!}</td>
                <td>{!! $passwordoEmpleado->password !!}</td>
                <td>{!! ($passwordoEmpleado->status == 1)? 'Activa' : 'Inactiva' !!}</td>

                <td>
                    {!! Form::open(['route' => ['passwordoEmpleados.destroy', $passwordoEmpleado->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('passwordoEmpleados.show', [$passwordoEmpleado->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('passwordoEmpleados.edit', [$passwordoEmpleado->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
