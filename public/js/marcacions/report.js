$.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });


$(document).ready(function() {


  //RANGO DE FECHA
  // $('#daterange' ).daterangepicker({
  //   "maxSpan": {
  //       "days": 6
  //   },
  //   "alwaysShowCalendars": true,
  //   "opens": "center",
  //   "autoUpdateInput" : false,
  //   "minDate": new Date('2019-11-19'),
  //   "ranges"   : {
  //     'Hoy'         : [moment(), moment()],
  //     'Ayer'        : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
  //   },
  //   "locale"    : {
  //     "format": "YYYY-MM-DD",
  //     "separator": " - ",
  //     "applyLabel": "Guardar",
  //     "cancelLabel": "Cancelar",
  //     "fromLabel": "Desde",
  //     "toLabel": "Hasta",
  //     "customRangeLabel": "Personalizar",
  //     "daysOfWeek": [
  //       "Do",         "Lu",         "Ma",         "Mi",
  //       "Ju",         "Vi",         "Sa"
  //     ],
  //     "monthNames": [
  //       "Enero",      "Febrero",    "Marzo",      "Abril",
  //       "Mayo",       "Junio",      "Julio",      "Agosto",
  //       "Setiembre",  "Octubre",    "Noviembre",  "Diciembre"
  //     ],
  //     "firstDay": 1,
  //     "startDate": moment().subtract(29, 'days'),
  //     "endDate"  : moment()
  //  },
  // }).on('apply.daterangepicker', function (e, picker) {
  //   $("#startDate").val(picker.startDate.format('DD-MM-YYYY'));
  //   $("#endDate").val(picker.endDate.format('DD-MM-YYYY'));
  // });
  // $('input[name="daterange"]').on('apply.daterangepicker', function(ev, picker) {
  //   $(this).val(picker.startDate.format('MM-DD-YYYY') + ' - ' + picker.endDate.format('MM-DD-YYYY'));
  // });
  // $('input[name="daterange"]').on('cancel.daterangepicker', function(ev, picker) {
  //   $(this).val('');
  //   $("#startDate").val('');
  //   $("#endDate").val('');
  // });
  //RANGO DE FECHA


  $("#marcacionsReport-table").DataTable({
    'language': {
      'buttons': {
             copyTitle: 'Realizado exitosamente',
             copySuccess: {
                 _: '%d lineas copiadas',
                 1: '1 linea copiada'
             },
             pageLength: {
              _: "Mostar %d Entradas",
              '-1': "Tout afficher"
          }
           },
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
     }
  });
});

//BUSQUEDA DE DATOS
$("#search").unbind('click');
$("#search"  ).click(function() {
  if(  $('#mes').val() == '' &&  $('#year').val() == ''){
    alert("¡Debes indicar mes y año!");
    return false;
  }
  var formulario = $("#formMarcaciones").serializeObject();

  table = $('#marcacionsReport-table').DataTable({
        'ajax': {
          'url': "/reportSearch",
          'type':"POST",
          'data' :{formulario : formulario}
        },
        'language': {
          'buttons': {
                 copyTitle: 'Realizado exitosamente',
                 copySuccess: {
                     _: '%d lineas copiadas',
                     1: '1 linea copiada'
                 },
                 pageLength: {
                  _: "Mostar %d Entradas",
                  '-1': "Tout afficher"
              }
               },
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
        'responsive'  : false,
        'autoWidth'   : true,
        'destroy'     : true,
        'deferRender' : true,
        dom: 'lBfrtip',
        buttons: [
          {
            extend: 'excel',
            text :   'EXCEL',
            messageTop: null,
          },
          {
            extend: 'copy',
            text: 'Copiar',
          },
        ],
        "fnRowCallback": function( nRow, aData, iDisplayIndex, iDisplayIndexFull ) {
          if( aData.tp_resto_entrada ===  'resto'){
            $('td', nRow).css('background-color', '#EA8080');
          }
        },
        'columns':[
           {data:"num"},
           {data:"nombre"},
           {data:"apellido"},
           {data:"fecha"},
           {data:"dia_letra"},
           {data:"entrada"},
           {data:"hora_inicio"},
           {data:"resto_entrada"},
           {data:"salida"},
           {data:"hora_salida"},
           {data:"resto_salida"},
           {data:"total_positivo"},
           {data:"total_negativo"},
           // {data:"status"},
         ]
    });

});
//BUSQUEDA DE DATOS


$("#clean" ).click(function() {
  $('#mes').val('').trigger('change');
  $('#year').val('').trigger('change');
});

//GET ARRAY FORM
$.fn.serializeObject = function(){
    var o = {};
    var a = this.serializeArray();
    $.each(a, function() {
        if (o[this.name]) {
            if (!o[this.name].push) {
                o[this.name] = [o[this.name]];
            }
            o[this.name].push(this.value || '');
        } else {
            o[this.name] = this.value || '';
        }
    });
    return o;
};
