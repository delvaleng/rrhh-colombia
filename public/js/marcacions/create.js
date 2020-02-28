$.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
var regexemail   = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
var regexnumbers = /^[0-9]+$/;
var regexletras  = /^[a-zA-Z\s]*$/;
var regexletnum  = /^[a-zA-Z0-9]+$/;
var regexfecha   = /^([0-9]{2}\/[0-9]{2}\/[0-9]{4})$/;
var regexaño     = /^([0-9]{4})$/;
var ejeX  = 4.7248181,    ejeY=-74.0716749;
var radio = 5;

// var latlng = new google.maps.LatLng(4.7248181,-74.0716749);


$(document).ready(function() {

  if (navigator.geolocation) { //check if geolocation is available
      navigator.geolocation.getCurrentPosition(function(position){
        console.log(position.coords.latitude);
        console.log(position.coords.longitude);
        $("#latitud").val(position.coords.latitude);
        $("#longitud").val(position.coords.longitude);
        var dentro = dentroDelCirculo(position.coords.latitude,position.coords.longitude);
        console.log('dentro?:' + dentroDelCirculo(position.coords.latitude,position.coords.longitude));
        if(dentro != true){
          $(".btnSend").attr("disabled", true);
        }else {
          $(".btnSend").attr("disabled", false);
        }
      });
  }




  $('#marcacions-form').submit(function() {
    var flag = true;
    var mensaje = '';

    if($("#longitud").val() == '' ||  $("#latitud").val() == ''){
      flag = false;
      mensaje += 'Debeer permitir tu ubicacion\n';
    }
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


function dentroDelCirculo(x,y) {
 return ((ejeX-x)**2 + (ejeY-y)**2) <= radio**2;
}
