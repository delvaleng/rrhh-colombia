@extends('layouts.app')
@section('css')
<link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.3.1/css/buttons.bootstrap.min.css">
<style>
  .btn-circle {
    width: 25px;
    height: 25px;
    padding: 6px 0px;
    border-radius: 15px;
    text-align: center;
    font-size: 10px;
  }
  .btn2.btn-default  {background:transparent,  border-color: #252d3d !important;}
  .btn2.btn2-primary {background-color: #08426a !important;  border-color: #252d3d !important; color : #fff !important}
  th, td { white-space: nowrap; }
  div.dataTables_wrapper {
    margin: 0 auto;
  }
  div.container {
    width: 80%;
  }

</style>
@endsection

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Marcaciones</h1>
    </section>
    <div class="content">
      <meta name="csrf-token" content="{{ csrf_token() }}">

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

<!-- Datatables -->
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.3.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.3.1/js/buttons.bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.3.1/js/buttons.colVis.min.js"></script>
<script src="{{ asset('vendor/datatables/buttons.server-side.js') }}"></script>
<script src="{{ asset('js/marcacions/index.js')}} "></script>
@endsection
