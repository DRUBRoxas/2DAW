//Escribir hora en el primer parrafo
window.addEventListener("load",function()
{
    var btn=document.getElementById("ejecuta");
    btn.addEventListener("click",function()
    {
        var p=document.getElementsByTagName("p")[0];
        p.innerHTML+=Date(); 
    });
});
/**creacion
 
  window.addEventListener("load",function()
  {

  })
 */