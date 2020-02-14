$(document).ready(function(){
    /*var catalogo=[];
    $.getJSON("ajax.php?accion",function(data){
        catalogo=data;
        console.log(catalogo);
    })*/

    $("a[id^=comprar]").click(function(ev){
        ev.preventDefault();
        codigo=((this.id).split("_"))[1];
        comprar(codigo);
    })

    $("a[id^=detalles]").click(function(ev){
        ev.preventDefault();
        codigo=((this.id).split("_"))[1];
        mostrarDetalles(codigo);
    })

    $("#ver_carrito").click(function(ev){
        ev.preventDefault();
        mostrarCarrito();
    })



    function comprar(codigo){
        console.log("Has comprado " +  codigo)
        $.get("ajax.php?accion=comprar&id="+codigo,function(data){
            if (data!=="ok"){
                alert("Error en la compra");
            }else{
                actualizarTotal();
            }
        })
    }

    function mostrarDetalles(codigo){
        console.log("Mostrando detalles producto " +  codigo)
        $.getJSON("ajax.php?accion=detalle&id="+codigo,function(data){
            console.log(data);
            var codigo2d=(codigo<10)?"0"+codigo:codigo;
            var ventana=$('<div class="producto_detalle">'+
            '<div class="info">' +
                '<div class="titulo_precio">Precio:</div>' +
                '<div class="precio">'+ data.precio+' â‚¬</div>' +
                '<a href="index.php?accion=comprar&amp;id='+codigo+'">Comprar</a>'+
                '<p>'+data.descripcion+'</p>'+
            '</div>' +
            '<div class="foto"><img src="index_files/'+codigo2d+'coc.jpg"></div>');
            console.log(ventana.find("a"));
            ventana.find("a").click(function(ev){
                ev.preventDefault();
                comprar(codigo);
            });

            $("body").append(ventana);
            ventana.dialog({
                modal:true,
                position:{ my: "center", at: "center", of: window },
                close: function(event, ui){
                    $(this).destroy().remove();        
                }
            });   
        })
    }

    function actualizarTotal(){
        $.getJSON("ajax.php?accion=ver_carrito",function(data){
            $("#total_carrito").text(data.total);
        })
    }

    function mostrarCarrito(){
        var nombre;
        var precio;
        var unidades;
        var codigo;
        var div=$("<div>");
        $.getJSON("ajax.php?accion=ver_carrito",function(data){
            var total=data.total;
            var i=0;
            for(i=0;i<data.productos.length;i++){
                var codigo=data.productos[i].id;
                
                var unidades=data.productos[i].cantidad;
                var totalLinea=data.productos[i].precio;
                (function(codigo,unidades,totalLinea){
                    $.getJSON("ajax.php?accion=detalle&id="+codigo,function(data){
                    var nombre=data.nombre;
                    var precio=data.precio;
                    var codigo2d=(codigo<10)?"0"+codigo:codigo;
                    var cadena='<div class="producto_detalle">'+
                    '<h3>'+ nombre +'</h3>'+
                    '<div class="info"><div class="resumen">'+
                            '<div class="titulo_precio">Precio:</div>'+
                            '<div class="precio">' + precio + ' â‚¬</div>'+
                        '</div>'+
                        '<div class="resumen"><div class="titulo_precio">Cantidad:</div>'+
                            '<div class="precio">' + unidades + ' unidad' + ((unidades!=1)?"es":"" )+ '</div>'+
                        '</div>'+
                        '<div class="resumen"><div class="titulo_precio">Total:</div>' +
                        '<div class="precio">'+ totalLinea +' â‚¬</div>' +
                        '</div>'+
                        '<div class="enlaces">'+
                            '<a href="index.php?accion=eliminar&amp;id='+codigo+'">Quitar del carrito</a>'+
                            '<a href="index.php?accion=comprar&amp;id='+codigo+'">Aumentar cantidad</a>'+
                            '<a href="index.php?accion=disminuir&amp;id='+codigo+'">Disminuir cantidad</a>'+
                        '</div></div>'+
                    '<div class="foto"><img src="index_files/'+codigo2d+'coc.jpg"></div></div>'
                    var producto=$(cadena);
                    producto.find("a[href*=eliminar]").click(function(ev){
                        ev.preventDefault();
                        eliminar(codigo,ev);
                    })
                    producto.find("a[href*=comprar]").click(function(ev){
                        ev.preventDefault();
                        aumentar(codigo,ev,precio,unidades);

                    })
                    producto.find("a[href*=disminuir]").click(function(ev){
                        ev.preventDefault();
                        disminuir(codigo,ev,precio,unidades);
                    })
                $("#total").parent().before(producto);
                })
            })(codigo,unidades,totalLinea);
            }
            var divTotal=$('<div class="producto_detalle"><h3 id="total">Total del carrito: '+total+' Ã„</h3></div>');

            div.append(divTotal);
            div.appendTo($("body"));
            div.dialog({
                modal:true,
                close:function(event,ui){
                    $(event.target).remove();
                }
            })
        })
    }
    function eliminar(codigo,ev){
        $.get("ajax.php?accion=eliminar&id="+codigo,function(data){
            if(data==="ok"){
                $(ev.target).parent().parent().parent().remove();
                actualizarTotal();
            }
        })
    }

    function aumentar(codigo,ev,precio,unidades){
        $.get("ajax.php?accion=comprar&id="+codigo,function(data){
            if (data==="ok"){
                var info=$(ev.target).parent().parent();
                var precio=info.find(".precio").eq(0);
                var cantidad=info.find(".precio").eq(1);
                var total=info.find(".precio").eq(2);
                cantidad.html(parseInt(cantidad.text())+1)

                //Falta terminarlo
                actualizarTotal();
            }
        })
    }
})