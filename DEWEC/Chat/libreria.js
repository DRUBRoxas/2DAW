window.addEventListener("load", function() {
            var hora = document.getElementById("hora");
            var display = document.getElementById("mensajes");
            var temporizador = setInterval(function() {
                var ajax1 = new XMLHttpRequest();
                ajax1.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        hora.innerHTML = this.responseText;
                    }
                }
                ajax1.open("GET", "hora.php", true);
                ajax1.send();
            }, 1000);

            document.getElementById("parar").onclick = function() {
                clearInterval(temporizador);
            }

            var temporizador2 = setInterval(function() {
                    var ajax1 = new XMLHttpRequest();
                    ajax1.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                            var respuesta = JSON.parse(this.responseText)
                            var i;
                            for (i = 0; i < respuesta.lenght; i++) {
                                var p = document.createElement("p");
                                var span = document.createElement("span");
                                span.innerHTML = "Mensaje nº " + respuesta[i].mensaje + ": ";
                                span.style.color = "red";
                                var texto = document.createTextNode(respuesta[i].contenido);
                                p.appendChild(span);
                                p.appendChild(texto);
                                display.appendChild(p);
                            }
                        }
                        ajax1.open("GET", "mensaje.txt", true);
                        ajax1.send();
                    }, 10000);

            })