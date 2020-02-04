$=jQuery;
jQuery(".categoryName a").click(function(ev) {
    ev.preventDefault();
    var url=jQuery(this).attr("href");
    var partes=url.split("=");
    var codigo = partes[1];
    var contenedor = $("<div>").load("http://www.fuentezuelas.com/course/index.php?categoryid="+codigo)
    console.log(camino);
    $.get(camino,
            function (data) {
                var cursos=$(data).find(".coursename");
                contenido.html("");
                cursos.appendTo(contenido);
            });
    modal.show();
    ventana.show();
    contenido.text(url);
})

var modal=Jquery("<div>").css({
    position:"fixed",
    left:0,
    top:0,
    width:"100%",
    height:"100%",
    "background-color":"gray",
    "opacity":0.5,
    "z-index":1000
});

var ventana=Jquery("div").css({
    position:"abosulute",
    left:"150px",
    top:"150px",
    right:"150px",
    bottom:"150px",
    background:"white",
    "opacity":1,
    "z-index":1001
})

var titulo=Jquery("<div>").css({
    position:"relative",
    top:"0px",
    height:"50px",
    background:"gray",
    "text-align":"right"
});

titulo.appendTo(ventana);
modal.appendTo(Jquery("<body>"));
ventana.appendTo(Jquery("<body>"));
var cerrar = Jquery("<span>").text("X").css({
    "font-size":"30px",
    padding:"10px",
    color:"white",
    fontWeight:"bolder",
    cursor:"pointer"
})

titulo.append(cerrar);

cerrar.click(function(){
    modal.hide();
    ventana.hide();
})