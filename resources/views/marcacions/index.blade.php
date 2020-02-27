@extends('layouts.app')
@section('css')

<link rel="stylesheet" href="{{ asset('plugins/DataTable/datatables.min.css') }}"/>
<link rel="stylesheet" href="{{ asset('bower_components/select2/dist/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('bower_components/bootstrap-daterangepicker/daterangepicker.css') }}">
<link rel="stylesheet" href="{{ asset('alertify/css/alertify.min.css') }}">
<link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">

<style>
  th, td { white-space: nowrap; }
  div.dataTables_wrapper {
    margin: 0 auto;
  }
  div.container {
    width: 80%;
  }
  th { font-size: 12px; }
  td { font-size: 11px; }
  label { font-size: 12px; }
</style>

@endsection

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">

    <section class="content-header">
        <h1 class="pull-left">Marcaciones</h1>
    </section>
    <div class="content">

      <div class="clearfix"></div>
      <div class="box box-primary">

        <form id=formMarcaciones>

        <div class="box-body">
          <meta name="csrf-token" content="{{ csrf_token() }}">
          <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                  <label for="id_invited_by" class="control-label">Fecha de Marcaci&oacute;n</label>
                  <div class="input-group">
                      <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                      {!! Form::text('daterange',   null, ['id'=>'daterange', 'class' => 'form-control']) !!}
                      {!! Form::hidden('startDate', null, ['id'=>'startDate', 'class' => 'form-control']) !!}
                      {!! Form::hidden('endDate',   null, ['id'=>'endDate', 'class' => 'form-control']) !!}
                  </div>
                  <div><span class="help-block" id="error"></span></div>
                </div>
              </div>
              <div class="col-sm-6">
                  <div class="form-group">
                    <label for="year" class="control-label">Empleado</label>
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-user"></i></div>
                        {!! Form::select('id_empleado', $tpempleado, null,['id'=>'id_empleado', 'placeholder' => 'Seleccione...', 'class'=>'form-control select2', 'style'=>'width: 100%'] ) !!}
                      </div>
                    <div><span class="help-block" id="error"></span></div>
                  </div>
                </div>
              </div>
        </div>

        <div class="box-footer">
          <button type="button" class="btn btn-default" id="clean">        Limpiar</button>
          <button type="button" class="btn btn-info pull-right" id="search">Buscar</button>
        </div>

        </form>

      </div>


        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('marcacions.table')
            </div>
        </div>
        <div class="text-center">

        </div>
    </div>

    <!-- Modal -->
<div class="modal fade" id="permisoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Registrar Autorizaci&oacute;n</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row" style="padding-left: 20px; padding-right:  20px">
          {!! Form::open(['route' => 'autorizacionEmpleados.store', 'id'=>'formAutorizacionEmpleados']) !!}
            @include('autorizacion_empleados.fields_modal')
          {!! Form::close() !!}
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary" id='sendAutorizacionEmpleados'>Guardar</button>
      </div>
    </div>
  </div>
</div>
@endsection

@section('scripts')
<!-- DataTable -->
<script src="{{ asset('plugins/DataTable/DataTables-1.10.18/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugins/DataTable/Responsive-2.2.2/js/dataTables.responsive.js') }}"></script>
<script src="{{ asset('plugins/DataTable/Buttons-1.5.2/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('plugins/DataTable/Buttons-1.5.2/js/buttons.flash.min.js') }}"></script>
<script src="{{ asset('plugins/DataTable/Buttons-1.5.2/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('plugins/DataTable/Buttons-1.5.2/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('plugins/DataTable/AJAX/jszip.min.js') }}"></script>
<script src="{{ asset('plugins/DataTable/AJAX/pdfmake.min.js') }}"></script>

<!-- select2 -->
<script src="{{ asset('bower_components/select2/dist/js/select2.full.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('bower_components/moment/min/moment.min.js') }}"></script>
<script src="{{ asset('bower_components/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
<!-- alertify -->
<script src="{{ asset('alertify/js/alertify.min.js') }}"></script>
<!-- enlace -->
<script src="{{ asset('js/marcacions/index.js')}} "></script>
@endsection
