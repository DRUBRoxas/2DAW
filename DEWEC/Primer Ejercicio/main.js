/*Comentario En bloque */
//Comentario en Linea


//Comprueba si el DNI introducido en el campo de texto es Válido
function CompruebaDNI()
{
    var dni=document.getElementById('dni').value;
    var num
    var letr
    var letra
    var estandar_dni
    
    //Formato estandar de DNI (copiadisimo de internet porque no lo entiendo la vd)
    estandar_dni = /^\d{8}[a-zA-Z]$/;
    
    //Comprobamos si el dni introducido coincide con el formato estandar del DNI
    if(estandar_dni.test (dni) == true)
    {
        //Pillo el numero completo
        num = dni.substr(0,dni.length-1);

        // pillo la letra para guardarla en una variable
        letr = dni.substr(dni.length-1,1);

        //hago el cálculo
        num = num % 23;

        //Letras disponibles
        letra='TRWAGMYFPDXBNJZSQVHLCKET';

        //Busco que letra es de las disponibles (Por posición)
        letra=letra.substring(num,num+1);

        //Compruebo si el dni es correcto o no, comparando la letra calculada con la introducida por el usuario
        if (letra!=letr.toUpperCase()) 
        {
            alert('Dni erroneo, la letra del NIF no se corresponde');
        }else
        {
            alert('Dni correcto');
        }
    }
    else
    {
        alert('Dni erroneo, formato no válido');
    }
}

//Comprueba si una edad introducida es mayor o menor de 18 (si eres mayor de edad, vamos)
function MayorEdad()
{
    //Obtiene la edad del campo correcto
    var edad=document.getElementById('edad').value;

    //comprueba 
    if (edad < 18)
    {
        alert('Menor');
        return false;
    }
    else
    {
        alert('Mayor');
        return true;
    }
}

//Comprueba si una cadena está vacia
function EstaVacia()
{
    var cadena=document.getElementById('cadena').value;
    if(cadena=='')
    {
        alert('Vacio');
        return True;
    }
    else
    {
        alert('Contiene datos');
        return False;
    }
}


//Calcula que numeros menores o iguales al introducido son primos
function Primos()
{
    var numprim=document.getElementById('numprim').value;
    if (numprim == 0 || numprim == 1)
    {
        alert('Numero incorrecto')
    }
    else
    {
        /*Calculamos el numero primo empezando desde 2 hasta llegar al numero introducido.
          Empieza por 2 porque el 1 y el 0 son numeros incorrectos.
        */
        for( i=2; i<=numprim; i++)
        {
            var creciente=2;
            var EsPrimo=true;
            
            while(EsPrimo && creciente < i )
            {
                if(i%creciente ==0)
                {
                    EsPrimo=false;
                }
                else
                {
                    creciente++;
                }
            }

            if(EsPrimo)
            {
                document.write(i+"</br>");
            }
        }
    }
}


//Calcula todos los divisores de un numero.
function Divisores()
{
    var numdiv = document.getElementById('div').value;
    var i=2;
    var mitad= numdiv/2;
    for (i;i < mitad; i++) 
    {
        if (numdiv % i == 0)
        {
           document.write(i,", ")
        }
    }
}

