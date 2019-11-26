@extends('layouts.app')
@section('css')
<link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.3.1/css/buttons.bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

<style>
  .btn-circle {
    width: 25px;
    height: 25px;
    padding: 6px 0px;
    border-radius: 15px;
    text-align: center;
    font-size: 12px;
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
        <h1 class="pull-left">Autorizacion Empleados</h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('autorizacion_empleados.table')
            </div>
        </div>
        <div class="text-center">

        </div>
    </div>
@endsection
@section('scripts')

<script src="https://code.jquery.com/jquery-3.3.1.js"></script>

<!-- Datatables -->
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
<script src="{{ asset('js/autorizacion_empleados/index.js')}} "></script>
@endsection
