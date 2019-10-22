
window.addEventListener("load",function() 
{
    var clicks=0;
    var btn1=document.getElementById("ejecuta");
    var i;
    btn1.addEventListener("click",function() {
        var p=document.getElementsByTagName("p")[0];
        p.innerHTML+=document.lastModified+"("+clicks+")";

        clicks++
    })
    var PulsadoP=function()
    {
        if(this.style.color=="red")
        {
            this.style.color="black";
        }
        else
        {
            this.style.color="red"
        }
    }
    var pes=document.getElementsByTagName("p");
    for (i=0;i<pes.length;i++){
        pes[i].onclick=PulsadoP;
    }
})
