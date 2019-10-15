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


function ValidarForm() {
    ValidaDNI();
    validaNomApe();
    validarEmail();
}