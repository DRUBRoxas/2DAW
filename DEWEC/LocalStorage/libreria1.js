//Lógica Funcionamiento parking


//Ponemos un evento en la carga de la página 
window.addEventListener("load", function() {
    var parking = new Parking();
    parking.recuperar();
    console.log(parking);
    //Cogemos el botón y le configuramos un evento en el click 
    document.getElementById("guardar").addEventListener("click", function() {
        var mat = this.parentNode.mat;
        var coche = new Coche(mat.value);
        mat.value = "";
        mat.focus();
        parking.entra(coche);
        parking.almacena();


    })





})