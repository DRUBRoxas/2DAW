function ValidaDNI() {
    var dni = document.getElementById('dni').value;
    var num
    var letr
    var letra
    var estandar_dni

    //Formato estandar de DNI (copiadisimo de internet porque no lo entiendo la vd)
    estandar_dni = /^\d{8}[a-zA-Z]$/;

    //Comprobamos si el dni introducido coincide con el formato estandar del DNI
    if (estandar_dni.test(dni) == true) {
        //Pillo el numero completo
        num = dni.substr(0, dni.length - 1);

        // pillo la letra para guardarla en una variable
        letr = dni.substr(dni.length - 1, 1);

        //hago el cálculo
        num = num % 23;

        //Letras disponibles
        letra = 'TRWAGMYFPDXBNJZSQVHLCKET';

        //Busco que letra es de las disponibles (Por posición)
        letra = letra.substring(num, num + 1);

        //Compruebo si el dni es correcto o no, comparando la letra calculada con la introducida por el usuario
        if (letra != letr.toUpperCase()) {
            document.getElementById('dni').style.border = '1px solid red';
        } else {
            document.getElementById('dni').style.border = '1px solid green';
        }
    }
    else {
        document.getElementById('dni').style.border = '1px solid red';
    }
}

function validaNomApe() {
    if (document.getElementById('nombre').value === "") {
        document.getElementById('nombre').style.border = '1px solid red';
    }
    else {
        document.getElementById('nombre').style.border = '1px solid green';
    }

    if (document.getElementById('apellidos').value === "") {
        document.getElementById('apellidos').style.border = '1px solid red';
    }
    else {
        document.getElementById('apellidos').style.border = '1px solid green';
    }
}

function validarEmail() {
    valor=document.getElementById('email').value;
    if (/[a-z]{1}[\wÁÉÍÓÚÑ]+@\w+\.\w+/.test(valor)) {
        document.getElementById('email').style.border = '1px solid green';
    } else {
        document.getElementById('email').style.border = '1px solid red';
    }
}


function ValidarFormAgri() {
    ValidaDNI();
    validaNomApe();
    validarEmail();
}

/**
 * TEORICAMENTE, esto pasandole la ID del campo de texto y 
 * la expresión debería de validar automaticamente
 * el campo que he pasado y ponerlo de un color o otro,
 * pero como no sé hasta que punto es viable, no lo uso,
 * pero aquí lo tengo pa por si aca.
 */

function validaPorTipo($id,$formato) {
    valor=document.getElementById($id).value;
    if($formato.test(valor))
    {
        document.getElementById($id).style.border = '1px solid green';
    } else {
        document.getElementById($id).style.border = '1px solid red';
    }
}

function Estacion()
{
    var $Fecha=new Date();
    var $Letra;
    var $mes=$Fecha.getMonth+1;
    
    if($mes == 12 || $mes == 1 || $mes == 2 || $mes == 3)
    {
        $Letra="I";
    }

    if($mes == 4 || $mes == 5 || $mes == 6)
    {
        $Letra="P";
    }

    if($mes == 7 || $mes == 8 || $mes == 9)
    {
        $Letra="V"
    }

    if($mes == 10 || $mes == 11 )
    {
        $Letra="O"
    }

    return $Letra;
}

function validarID(){

    $valor=document.getElementById('id_actividad').value;
    $Letra1;

    if(/^(T|L|t|l)\d{4}(I|P|O|V|i|p|o|v)/.test($valor))
    {
        document.getElementById('id_actividad').style.border = '1px solid green';
    } else {
        document.getElementById('id_actividad').style.border = '1px solid red';
    }



}