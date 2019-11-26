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
        <h1 class="pull-left">Reporte de Marcaciones</h1>
    </section>
    <div class="clearfix"></div>
    <div class="clearfix"></div>

    <div class="content">
        <div class="clearfix"></div>
        <div class="box box-primary">

          <form id=formMarcaciones>

          <div class="box-body">
            <meta name="csrf-token" content="{{ csrf_token() }}">
            <div class="row">
              <div class="col-sm-6">
                  <div class="form-group">
                    <label for="mes" class="control-label">Mes</label>
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                        <select id="mes" class="form-control select2" style="width: 100%" name="mes">
                        <option selected="selected" value="">Seleccione...</option>
                        <option value="01">Enero</option>
                        <option value="02">Febrero</option>
                        <option value="03">Marzo</option>
                        <option value="04">Abril</option>
                        <option value="05">Mayo</option>
                        <option value="06">Junio</option>
                        <option value="07">Julio</option>
                        <option value="08">Agosto</option>
                        <option value="09">Septiembre</option>
                        <option value="10">Octubre</option>
                        <option value="11">Noviembre</option>
                        <option value="12">Diciembre</option>
                        </select>                    </div>
                    <div><span class="help-block" id="error"></span></div>
                  </div>
                </div>
              <div class="col-sm-6">
                  <div class="form-group">
                    <label for="year" class="control-label">Año</label>
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                        <select id="year" class="form-control select2" style="width: 100%" name="year">
                        <option selected="selected" value="">Seleccione...</option>
                        <option value="2019">2019</option>
                        <option value="2020">2020</option>
                        <option value="2021">2021</option>
                        </select>                    </div>
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

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
              @include('marcacions.table_report')
            </div>
            <div class="box-footer">
              <div class="form-group"><div class="col-xs-12">
                <label for="Datos">Leyenda:<br> <br>
                <code>**H/Entrada : Hora oficial de entrada. <br>**H/Inicio  : Hora de llegada del empleado. <br>
                  **H/Salida  : Hora oficial de salida.      <br>**H/Fin     : Hora de salida del empleado.  <br>
                  **Min/Ttal(+)  : Minutos extras.           <br>**Min/Ttal(-)  : Minutos tarde.  <br>

                </code>
                </label></div></div>
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


<script src="{{ asset('js/marcacions/report.js')}} "></script>
@endsection
