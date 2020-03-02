$.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
var regexemail   = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
var regexnumbers = /^[0-9]+$/;
var regexletras  = /^[a-zA-Z\s]*$/;
var regexletnum  = /^[a-zA-Z0-9]+$/;
var regexfecha   = /^([0-9]{2}\/[0-9]{2}\/[0-9]{4})$/;
var regexaño     = /^([0-9]{4})$/;
var lat1  = 4.7248181,    lon1=-74.0716749;
// var latlng = new google.maps.LatLng(4.7248181,-74.0716749);


$(document).ready(function() {
  loadLocation ();

  /*if (navigator.geolocation) { //check if geolocation is available
      navigator.geolocation.getCurrentPosition(function(position){
        console.log(position.coords.latitude);
        console.log(position.coords.longitude);

        $("#latitud").val(position.coords.latitude);
        $("#longitud").val(position.coords.longitude);

        if(position.coords.latitude != null && position.coords.longitude != null){
        var distancia = Dist(lat1, lon1, position.coords.latitude, position.coords.longitude);
        console.log('distancia?:' + distancia);
          if(distancia > 1){
            $(".btnSend").attr("disabled", true);
          }else {
            $(".btnSend").attr("disabled", false);
          }
        }
      });
  }*/




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

function loadLocation () {
//inicializamos la funcion y definimos  el tiempo maximo ,las funciones de error y exito.
navigator.geolocation.getCurrentPosition(viewMap,ViewError,{timeout:1000});
}

function viewMap (position) {

  /*var success = function(position){
    var latlng = new google.maps.LatLng(position.coords.latitude, position.coords.longitude)
    var myOptions = {
    zoom: 15,
    center: latlng,
    mapTypeControl: false,
    navigationControlOptions: {style: google.maps.NavigationControlStyle.SMALL},
    mapTypeId: google.maps.MapTypeId.ROADMAP
    }
    var map = new google.maps.Map(document.getElementById("mapcanvas"), myOptions)
    var marker = new google.maps.Marker({
    position: latlng,
    map: map,
    title:"Estás aquí! (en un radio de "+position.coords.accuracy+" metros)"
    })
  }*/


	var lon = position.coords.longitude;	//guardamos la longitud
	var lat = position.coords.latitude;		//guardamos la latitud

  $("#latitud").val(lat);
  $("#longitud").val(lon);

  console.log(lat);
  console.log(lon);

  if(lat != null && lon != null){
  var distancia = Dist(lat1, lon1, lat, lon);
  console.log('distancia?:' + distancia);
    if(distancia > 1){
      $(".btnSend").attr("disabled", true);
    }else {
      $(".btnSend").attr("disabled", false);
    }
  }
	// var link = "http://maps.google.com/?ll="+lat+","+lon+"&z=14";
	// document.getElementById("long").innerHTML = "Longitud: "+lon;
	// document.getElementById("latitud").innerHTML = "Latitud: "+lat;
	// document.getElementById("link").href = link;

}



function ViewError (error) {
	alert(error.code);
}



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
