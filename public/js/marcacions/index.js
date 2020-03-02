$.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
var lat1  = 4.7248181,    lon1=-74.0716749;

$(document).ready(function() {


    //RANGO DE FECHA
    $('#daterange' ).daterangepicker({
      "autoUpdateInput" : false,
      "ranges"   : {
        'Hoy'         : [moment(), moment()],
        'Ayer'        : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
        'Hace 7 Dias' : [moment().subtract(6, 'days'), moment()],
        'Hace 30 Dias': [moment().subtract(29, 'days'), moment()],
        'Este Mes'    : [moment().startOf('month'), moment().endOf('month')],
        'Mes Pasado'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
      },
      "locale"    : {
        "format": "YYYY-MM-DD",
        "separator": " - ",
        "applyLabel": "Guardar",
        "cancelLabel": "Cancelar",
        "fromLabel": "Desde",
        "toLabel": "Hasta",
        "customRangeLabel": "Personalizar",
        "daysOfWeek": [
          "Do",         "Lu",         "Ma",         "Mi",
          "Ju",         "Vi",         "Sa"
        ],
        "monthNames": [
          "Enero",      "Febrero",    "Marzo",      "Abril",
          "Mayo",       "Junio",      "Julio",      "Agosto",
          "Setiembre",  "Octubre",    "Noviembre",  "Diciembre"
        ],
        "firstDay": 1,
        "startDate": moment().subtract(29, 'days'),
        "endDate"  : moment()
     },
    }).on('apply.daterangepicker', function (e, picker) {
      $("#startDate").val(picker.startDate.format('DD-MM-YYYY'));
      $("#endDate").val(picker.endDate.format('DD-MM-YYYY'));
    });
    $('input[name="daterange"]').on('apply.daterangepicker', function(ev, picker) {
      $(this).val(picker.startDate.format('MM-DD-YYYY') + ' - ' + picker.endDate.format('MM-DD-YYYY'));
    });
    $('input[name="daterange"]').on('cancel.daterangepicker', function(ev, picker) {
      $(this).val('');
      $("#startDate").val('');
      $("#endDate").val('');
    });
    //RANGO DE FECHA

  $("#marcacions-table").DataTable({
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


function Dist(lat1, lon1, lat2, lon2) {
     rad = function (x) {
         return x * Math.PI / 180;
     }

     var R = 6378.137;//Radio de la tierra en km
     var dLat = rad(lat2 - lat1);
     var dLong = rad(lon2 - lon1);
     var a = Math.sin(dLat / 2) * Math.sin(dLat / 2) + Math.cos(rad(lat1)) * Math.cos(rad(lat2)) * Math.sin(dLong / 2) * Math.sin(dLong / 2);
     var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
     var d = R * c;
     return d.toFixed(3);//Retorna tres decimales
}


//BUSQUEDA DE DATOS
$("#search").unbind('click');
$("#search"  ).click(function() {

  var formulario = $("#formMarcaciones").serializeObject();
  table = $('#marcacions-table').DataTable({
        'ajax': {
          'url': "/getMarcacions",
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

          if(aData.latitud != null && aData.longitud != null){
          var distancia = Dist(lat1, lon1, aData.latitud, aData.longitud);
            if(distancia > 1){
              $('td', nRow).css('background-color', '#EA8080');
            }
          }
          $("td:first", nRow).html(iDisplayIndex +1);
          return nRow;
        },
        'columns':[
          {data:"id",
          "render": function (data, type, row) {
            return data;
          }},
          {data:"id",
          "render": function (data, type, row) {
              return '<a class="modalPermiso"'+
              'data-id  = "'+data+'"'+
              '><i class="fa fa-star-o"></i></a>';
          }},
          {data:"empleado",
          "render": function (data, type, row) {
            return (data)? convertir(data.usuario.toLowerCase()) : '-';
          }},
          {data:"tp_marcacion",
          "render": function (data, type, row) {
            return (data)? data.descripcion : '-';
          }},
          {data:"dia",
          "render": function (data, type, row) {
            if(data) {
              var today = new Date(data);
              var dd = today.getDate();
              var mm = today.getMonth()+1; //January is 0!
              var yyyy = today.getFullYear();
              if(dd<10){dd='0'+dd} if(mm<10){mm='0'+mm}
              var today = dd+'-'+mm+'-'+yyyy;
              return today;
            }
              else{
                return  '-';
              }
              return (data)? data : '-';

          }},
          {data:"hora_inicio",
          "render": function (data, type, row) {
            return (data)? data : '-';
          }},
          {data:"hora_fin",
          "render": function (data, type, row) {
            return data;
          }},
          {data:"total_min",
          "render": function (data, type, row) {
            return (data)? data : '-';
          }},
          {data:"observacion",
          "render": function (data, type, row) {
            return (data)? data : '-';
          }},
          {data:"id",
          "render": function (data, type, row) {

            if (row.latitud != null && row.longitud != null){
              return '<a class="gpsUbicacion"'+
              'data-lat  = "'+row.latitud+'"'+
              'data-long = "'+row.longitud+'"'+
              '><i class="fa fa-map-pin"></i></a>';
            }else{
              return '<i class="fa fa-ban"></i>'
            }

          }},
          {data:"ip_ubicacion",
          "render": function (data, type, row) {
            return (data)? data : '-';
          }},
        ]
    });

});
//BUSQUEDA DE DATOS

function convertir(string) {
  return string.toUpperCase();
}
$("#clean" ).click(function() {
  $("#startDate").val('');
  $("#endDate").val('');
  $('input[name="daterange"]').val('');
  $('#id_empleado').val('').trigger('change');
});




$('#marcacions-table tbody' ).on('click','.modalPermiso', function () {

  var id_marcacion = $(this).data('id');

  $.ajax({
    url: "/searchAutorizacion",
    type:"POST",
    data : { id_marcacion : id_marcacion },
    dataType: "json",
  }).done(function(d){
    if (d.object == 'success'){
      if(d.data !=null){
        $("#creado_by"   ).val(d.data.creado_by);
        $("#aprobado_by" ).val(d.data.aprobado_by);
        $("#observacion" ).val(d.data.observacion);
      }else{
        $("#creado_by"   ).val('');
        $("#aprobado_by" ).val('');
        $("#observacion" ).val('');
      }
      $("#id_marcacion").val(id_marcacion);
      $("#permisoModal").modal('show');
    }
  }).fail(function(error){ alert("Ha ocurrido un error en la operación!."); });

});
$( "#sendAutorizacionEmpleados" ).click(function() {
  var flag = true;
  var alertstr = 'Hemos encontrado lo siguiente: \n';
  if ($("#creado_by"   ).val() == ''){flag=false; alertstr += 'Debe rellenar el campo CREADO \n'; }
  if ($("#aprobado_by" ).val() == ''){flag=false; alertstr += 'Debe rellenar el campo APROBADO\n'; }
  if ($("#observacion" ).val() == ''){flag=false; alertstr += 'Debe rellenar el campo OBSERVACION\n'; }
  if(flag== false){
    alert(alertstr);
    return false;
  }

  $.ajax({
    url: "/sendAutorizacion",
    type:"POST",
    data : { formulario : $("#formAutorizacionEmpleados").serializeObject(), },
    dataType: "json",
  }).done(function(d){
    if (d.object == 'success'){
      $("#permisoModal").modal('hide');
      $("#creado_by"   ).val('');
      $("#aprobado_by" ).val('');
      $("#observacion" ).val('');
    }
  }).fail(function(error){ alert("Ha ocurrido un error en la operación!."); });

});

$('#marcacions-table tbody' ).on('click','.gpsUbicacion', function () {
  var long = $(this).data('long');
  var lat = $(this).data('lat');

  var ruta = '/marcacionsMaps/'+long+'/'+lat;
  PopupCenter(ruta,'xtf','900','500');
});
function PopupCenter  (url, title, w, h) {
    // Fixes dual-screen position                         Most browsers      Firefox
    var dualScreenLeft = window.screenLeft != undefined ? window.screenLeft : screen.left;
    var dualScreenTop = window.screenTop != undefined ? window.screenTop : screen.top;

    var width = window.innerWidth ? window.innerWidth : document.documentElement.clientWidth ? document.documentElement.clientWidth : screen.width;
    var height = window.innerHeight ? window.innerHeight : document.documentElement.clientHeight ? document.documentElement.clientHeight : screen.height;

    var left = ((width / 2) - (w / 2)) + dualScreenLeft;
    var top = ((height / 2) - (h / 2)) + dualScreenTop;
    var newWindow = window.open(url, title, 'scrollbars=yes, width=' + w + ', height=' + h + ', top=' + top + ', left=' + left);

    // Puts focus on the newWindow
    if (window.focus) {
        newWindow.focus();
    }
}

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
