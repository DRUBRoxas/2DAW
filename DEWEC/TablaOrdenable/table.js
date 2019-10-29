HTMLTableElement.prototype.ordenar=function(columna,tipo) 
{
    var cabezales= document-this.getElementsByTagName("th");
    var i=0;
    var long=cabezales.length;

    for(i=0;i<long;i++)
    {
        
    }
}

window.addEventListener("load",function(){
    var ths=this.document.getElementsByTagName("th");

    ths[0].onclick=function(){
        console.log(0);
    }
    ths[1].onclick=function(){
        console.log(1);
    }
    ths[2].onclick=function(){
        console.log(2);
    }
    ths[3].onclick=function(){
        console.log(3);
    }

    var i;

    for(i=0;i<ths.length;i++)
    {
        ths[i].onclick=programar(i);
    }
})

function programar(i){

    return function(){
        console.log(i);
    }
}

HTMLTableElement.prototype.editar=function() {
   var texto=this.innerText;
   var input=document.createElement(input);
    input.type="text";
    input.value=texto;
    input.onblur=function(){
        var texto=this.value;
        this.parentNode.innerHTML=texto;
    }
    texto.innerHTML="";
    texto.appenChild(input);
    
}