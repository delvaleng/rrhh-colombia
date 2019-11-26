$.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });


$(document).ready(function() {
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


$( ".modalPermiso" ).click(function() {
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
