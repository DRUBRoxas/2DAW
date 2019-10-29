window.addEventListener("load",function()
{
    var sel1=document.getElementById("matriculados");
    var sel2=document.getElementById("aprobados");
    var boton=document.getElementById("matricular");
    boton.addEventListener("click",function(ev)
    {
        ev.preventDefault();
        var textArea=document.getElementById("matriculas");
        var alumnos=textArea.value.split("\n");
        var option;
        var select=document.getElementById("matriculados");
        for(i=0;i<alumnos.length;i++)
        {
            if(/\w/.test(alumnos[i]))
            {
                option=document.createElement("option");
                option.innerHTML=alumnos[i];
                select.appendChild(option);
            }
        }
    });
    var boton=document.getElementById("izq");
    boton.addEventListener("click",function(ev)
    {
        ev.preventDefault();
        sel1.pasarA(sel2);
    });
    var boton=document.getElementById("izqT");
    boton.addEventListener("click",function(ev)
    {
        ev.preventDefault();
        sel1.pasarTA(sel2);
    });
    var boton=document.getElementById("der");
    boton.addEventListener("click",function(ev)
    {
        ev.preventDefault();
        sel2.pasarA(sel1);
    });
    var boton=document.getElementById("derT");
    boton.addEventListener("click",function(ev)
    {
        ev.preventDefault();
        sel2.pasarTA(sel1);
    });
});


HTMLTableElement.prototype.ordena=function(col,tipo)
{
    
}