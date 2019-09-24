$.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
var regexemail   = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
var regexnumbers = /^[0-9]+$/;
var regexletras  = /^[a-zA-Z\s]*$/;
var regexletnum  = /^[a-zA-Z0-9]+$/;
var regexfecha   = /^([0-9]{2}\/[0-9]{2}\/[0-9]{4})$/;
var regexaño     = /^([0-9]{4})$/;

$(document).ready(function() {

  if (navigator.geolocation) { //check if geolocation is available
      navigator.geolocation.getCurrentPosition(function(position){
        console.log(position.coords.latitude);
        console.log(position.coords.longitude);

        $("#latitud").val(position.coords.latitude);
        $("#longitud").val(position.coords.longitude);
      });
  }

  $('#marcacions-form').submit(function() {
    var flag = true;
    var mensaje = '';

    if($("#id_empleado").val() == ''){
      flag = false;
      mensaje += 'Debes seleccionar el empleado\n';
    }
    if($("#id_tp_marcacion").val() == ''){
      flag = false;
      mensaje += 'Debes seleccionar el tipo de marcación\n';
    }
    if($("#password").val() == ''){
      flag = false;
      mensaje += 'Indica tu clave\n';
    }
    if(flag == false){
      alert(mensaje);
      return false;
    }else {
      return true;
    }
  });

});
