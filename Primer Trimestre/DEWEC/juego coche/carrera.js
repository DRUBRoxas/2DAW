
window.addEventListener("load", function(){
   
    var c = document.getElementById("coche");
    var ctx = c.getContext("2d");
    var coche = new Coche(40,20,[100,100],"yellow", ctx);
    

    window.addEventListener("keydown",function(ev){
        ev.preventDefault();
        if(ev.key=="a")
        {
            coche.arrancar();
        }
        else if(ev.key=="ArrowUp")
        {
            if(coche.temporizador)
            coche.acelerar();
        }
        else if(ev.key=="ArrowDown")
        {
            coche.frenar();
        }
        else if(ev.key=="p")
        {
            coche.parar();
        }
    })

})

