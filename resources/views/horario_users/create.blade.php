@extends('layouts.app')
@section('css')
<link rel="stylesheet" type="text/css" href="https://adminlte.io/themes/AdminLTE/bower_components/select2/dist/css/select2.min.css" />
@endsection
@section('content')
    <section class="content-header">
        <h1>
            Horario de Empleados
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'horarioUsers.store']) !!}

                        @include('horario_users.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2();
  })
</script>
@endsection
