window.addEventListener("load",function()
{
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
});
