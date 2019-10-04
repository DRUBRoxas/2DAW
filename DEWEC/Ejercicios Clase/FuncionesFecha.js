//funcion que valida una fecha devolviendo un boolean
function aFecha(fecha) {
  if (FechaValida(fecha)) {
    modfecha = fecha.split("/");
    var d = modfecha[0];
    var m = modfecha[1];
    var y = modfecha[2];

    var Fecha = new Date(y, m - 1, d);

    return Fecha;
  } else {
    alert("fecha invalida");
  }
}

function FechaValida(fecha) {
  var modfecha = fecha.split("/");
  var d = modfecha[0];
  var m = modfecha[1];
  var y = modfecha[2];
  return (
    m > 0 &&
    m < 13 &&
    y > 0 &&
    y < 32768 &&
    d > 0 &&
    d <= new Date(y, m, 0).getDate()
  );
}

function MayorEdad(fecha) {
  var a = aFecha(fecha);
  hoy = new Date();
  edad = parseInt((hoy - a) / 365 / 24 / 60 / 60 / 1000);
  if (edad < 18) {
    return false;
  }
  return true;
}

function MayorQue(fecha1, fecha2) {
  var a = aFecha(fecha1);
  var b = aFecha(fecha2);
  return a - b == 0 ? 0 : (a - b) / Math.abs(a - b);
}

function diasVivo(fechanac) {
  var a = aFecha(fechanac);
  var b = new Date();
  var dif = b - a;
  var dias = Math.floor(dif / (1000 * 60 * 60 * 24));
  return dias;
}

function diasEntre(fecha1, fecha2) {
  var a = aFecha(fecha1);
  var b = aFecha(fecha2);
  var dif = b - a;
  var dias = Math.floor(dif / (1000 * 60 * 60 * 24));
  return dias;
}

function diaSemana(fecha1) {
  var a = aFecha(fecha1);
  var b = a.toString();
  var c = b.substr(0, 3);
  switch (c) {
    case "Mon":
      return "Lunes";
      break;
    case "Tue":
      return "Martes";
      break;
    case "Wed":
      return "Miercoles";
      break;
    case "Thu":
      return "Jueves";
      break;
    case "Fri":
      return "Viernes";
      break;
    case "Sat":
      return "Sabado";
      break;
    case "Sun":
      return "Domingo";
      break;
  }
}

function mes(fecha) {
  var a = aFecha(fecha);
  var b = a.toString();
  var c = b.substr(4, 3);
  switch (c) {
    case "Jan":
      return "Enero";
      break;
    case "Feb":
      return "Febrero";
      break;
    case "Mar":
      return "Marzo";
      break;
    case "Apr":
      return "Abril";
      break;
    case "May":
      return "Mayo";
      break;
    case "Jun":
      return "Junio";
      break;
    case "Jul":
      return "Julio";
      break;
    case "Aug":
      return "Agosto";
      break;
    case "Sep":
      return "Septiembre";
      break;
    case "Oct":
      return "Octubre";
      break;
    case "Nov":
      return "Noviembre";
      break;
    case "Dec":
      return "Diciembre";
      break;
  }
}

function AniosCumplidos(fechanac)
{
  var a=aFecha(fechanac);
  hoy = new Date();
  edad = parseInt((hoy - a) / 365 / 24 / 60 / 60 / 1000);
  return edad;
}

Date.prototype.toString=function()
{
  var dia=this.getDate();
  dia=((dia<10)?"0":"")+dia
  var mes=this.getMonth()+1;
  mes=((mes<10)?"0":"")+mes
  var year=this.getFullYear();
  var retorno=dia+"/"+mes+"/"+year;
  return retorno;
}