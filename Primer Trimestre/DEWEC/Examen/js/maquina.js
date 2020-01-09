window.addEventListener("load", function() {
    var exp = new Expendedor();
    display = document.getElementById("display");
    exp.cargarM(monedas);
    exp.cargarP(productos);
    var monederoo = exp.monedero;
    var productoos = exp.productos;
    imprimeMonedas(monederoo);
    imprimeProductos(productoos);

    window.addEventListener("keypress", function(ev) {
        if (ev.keyCode == 13) {
            var voltio = exp.recuperar();
            imprimeVuelta(voltio)

        }
    })

    function imprimeMonedas(monedero) {
        campomonedas = document.getElementById("monedas")
        campomonedas.innerHTML = "";
        display.innerHTML = "";
        for (i in monedero) {
            var img = document.createElement("img");
            img.setAttribute("class", "moneda")
            img.setAttribute("src", exp.monedero[i].src);
            img.onclick = function(i) {
                return function() {
                    exp.insertarMoneda(i);
                    euros = exp.totalIntroducido / 100;
                    display.innerHTML = euros += "€";

                }
            }(i)
            campomonedas.appendChild(img);
        }
    }

    function imprimeProductos(productos) {
        campoproductos = document.getElementById("productos")
        campoproductos.innerHTML = "";
        for (i in productos) {
            var img = document.createElement("img");
            img.setAttribute("class", "producto")
            img.setAttribute("src", exp.productos[i].src);
            img.onclick = function(i) {
                return function() {
                    if (exp.totalIntroducido == 0) {
                        euros = exp.productos[i].precio / 100;
                        display.innerHTML = euros += "€"
                    } else {
                        venta = exp.vender(i);
                        if (venta.vendido == false) {
                            display.innerHTML = venta.mensaje;
                        }
                    }

                }
            }(i)
            campoproductos.appendChild(img);
        }
    }

    function imprimeVuelta(vuelta) {
        campovuelta = document.getElementById("cajon")
        campovuelta.innerHTML = "";
        display.innerHTML = "";
        for (i in vuelta) {
            var img = document.createElement("img");
            img.setAttribute("class", "moneda")
            img.setAttribute("src", vuelta[i].src);
            campovuelta.appendChild(img);
        }
    }
})