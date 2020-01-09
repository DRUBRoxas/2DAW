window.addEventListener("load", function() {


    var t = new Tienda();
    t.cargarProductos(articulos);

    var productos = document.getElementById("articulos");
    var carrito = document.getElementById("Carrito");
    var total = document.getElementById("total")


    function pintarAlCarrito() {
        var i = 0;
        carrito.innerHTML = "";
        for (i in t.carrito) {
            var fila = carrito.insertRow(-1);
            var tdC = fila.insertCell(-1);
            tdC.innerHTML = i;
            var tdD = fila.insertCell(-1);
            tdD.innerHTML = t.productos[i].descripcion;
            var tdP = fila.insertCell(-1);
            tdD.innerHTML = t.productos[i].precio;
            var tdAcc = fila.insertCell(-1);
            var btnQ = document.createElement("button");
            btnQ.innerHTML = "-";
            btnQ.onclick = function(cod) {
                return function() {
                    t.quitar(cod);
                    pintarAlCarrito();
                }
            }(i)
            var btnA = document.createElement("button");
            btnA.innerHTML = "+";
            var span = document.createElement("span");
            span.innerHTML = t.carrito[i];
            btnA.onclick = function(cod) {
                return function() {
                    t.anadir(cod);
                    pintarAlCarrito();
                }
            }(i)

            tdAcc.appendChild(btnQ);
            tdAcc.appendChild(span);
            tdAcc.appendChild(btnA);


        }
        total.innerHTML = t.total.toFixed(2);
    }

    var i;
    for (i in t.productos) {
        var fila = document.createElement("tr");
        var tdC = document.createElement("td");
        var tdD = document.createElement("td");
        var tdP = document.createElement("td");
        var tdAcc = document.createElement("td");

        tdC.innerHTML = i;
        tdD.innerHTML = t.productos[i].descripcion;
        tdP.innerHTML = t.productos[i].precio;
        var boton = document.createElement("button");
        boton.innerHTML = "Comprar"
        tdAcc.appendChild(boton)
        fila.appendChild(tdC);
        fila.appendChild(tdD);
        fila.appendChild(tdP);
        fila.appendChild(tdAcc);


        //Esta parte es importante compañero
        boton.onclick = function(cod) {
            return function() {
                t.anadir(cod);
                console.log(t)
                pintarAlCarrito();
            }
        }(i)

        productos.appendChild(fila);

    }

    window.addEventListener("keypress", function(ev) {
        if (ev.keyCode == 13) {
            var respuesta = t.vender();
            pintarAlCarrito();
            var ventana = window.open("about:blank");

            ventana.document.body.innerHTML = "<h1>KKKKKKKKK</h1>"
            ventana.print();
        }
    })

})