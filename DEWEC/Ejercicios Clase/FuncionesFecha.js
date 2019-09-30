//funcion que valida una fecha devolviendo un boolean
function aFecha(fecha) 
{
  if(FechaValida(fecha))
  {
       modfecha = fecha.split("/");
  var d = modfecha[0];
  var m = modfecha[1];
  var y = modfecha[2];

  var Fecha = new Date(y, m - 1, d);

  return Fecha;
  }
  else
  {
      alert('fecha invalida');
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
  if (edad < 18) 
  {
    return false;
  }
  return true;
}

function MayorQue(fecha1,fecha2)
{
    var a = aFecha(fecha1);
    var b = aFecha(fecha2);

    return ((a-b)==0)?0:((a-b)/Math.abs(a-b));

}

function diasVivo (fechanac)
{
    var a= aFecha(fechanac);
    var b= new Date();
    var dif = b - a;
    var dias = Math.floor(dif / (1000 * 60 * 60 * 24));
    return dias;
}

function diasEntre (fecha1,fecha2)
{
    var a= aFecha(fecha1);
    var b= aFecha(fecha2);
    var dif = b - a;
    var dias = Math.floor(dif / (1000 * 60 * 60 * 24));
    return dias;
}
