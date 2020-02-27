@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="{{ asset('plugins/DataTable/datatables.min.css') }}"/>
@endsection
@section('content')
    <section class="content-header">
        <h1 class="pull-left">Horario de Empleados</h1>
        <h1 class="pull-right">
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('horarioUsers.create') !!}">+</a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('horario_users.table')
            </div>
        </div>
        <div class="text-center">

        </div>
    </div>
@endsection

@section('scripts')
<!-- DataTable -->
<script src="{{ asset('plugins/DataTable/DataTables-1.10.18/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugins/DataTable/Responsive-2.2.2/js/dataTables.responsive.js') }}"></script>
<script type="text/javascript">
$.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });

  var table;
  table = $('#horarioUsers-table').dataTable({
      'responsive'  : true,
      'autoWidth': false,
      'destroy'   : true,
      'responsive'  : true,
      'language': {
         "decimal": "",
         "emptyTable": "No hay información",
         "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
         "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
         "infoFiltered": "(Filtrado de _MAX_ total entradas)",
         "infoPostFix": "",
         "thousands": ",",
         "lengthMenu": "Mostrar _MENU_ Entradas",
         "loadingRecords": "Cargando...",
         "processing": "Procesando...",
         "search": "Buscar:",
         "zeroRecords": "Sin resultados encontrados",
         "paginate": {
             "first": "Primero",
             "last": "Ultimo",
             "next": "Siguiente",
             "previous": "Anterior"
         }
       },
    });
</script>

@endsection
