window.addEventListener("load", function () {
    var div1 = document.getElementById("i1");
    /**
     
    
    div1.addEventListener("click", function (ev) {
        console.log(ev.target);
        console.log(ev);
        alert("pulsado1");
    })
    var div2 = document.getElementById("i2")
    div2.addEventListener("click", function (ev) {
        console.log(ev.target);
        console.log(ev);
        alert("pulsado2")
        ev.stopPropagation();
    })
    */
    window.addEventListener("keydown",function(ev)
    {
        console.log(ev);

    })
    

    var i=0;
    var input=document.getElementById("fecha")
    input.addEventListener("keyup", function(){
        input1=input.value;
        if(input1.length==2 || input1.length==5)
        {
            input.value+="/";
        }
    })
})