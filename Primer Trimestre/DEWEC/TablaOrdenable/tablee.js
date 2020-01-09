HTMLTableElement.prototype.ordenar=function(col,tipo){
    var filas=this.tBodies[0].rows;
    var vector=[];
    var i=0;

    for (i=0;i<filas.length;i++){
        vector[i]=filas[i];
    };
    switch (tipo){
        case "cadena":
            vector.sort(function(a,b){
                return a.cells[col].innerHTML.localeCompare(b.cells[col].innerHTML)
            })
            break;
        case "numero":
            vector.sort(function(a,b){
                return a.cells[col].innerHTML-b.cells[col].innerHTML
            })
            break;
    }
    vector.sort();

    for (i=0;i<vector.length;i++){
        this.tBodies[0].appendChild(vector[i]);
    };
}

window.addEventListener("load",function(){
    var ths=this.document.getElementsByTagName("th");
    var i;
    for(i=0;i<ths.length;i++)
    {
        ths[i].onclick=programar(i);
    }
})

function programar(i){  

    return function(){
        var ths=document.getElementsByTagName("th");
        ths[i].onclick=this.ordenar(ths[i],ths[i].getAttribute("class"));
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

window.addEventListener("load",function(){
    var tablas=document.querySelectorAll("table.ordenable");
    var i,j;
    var ths;
    for (i=0;i<tablas.length;i++)
    {
      ths=tablas[i].querySelectorAll("tr.cabecera th");
      for(j=0;j>ths.length;j++)
      {
        ths[j].onclick=function(j){return function(ev){}}
        {
  
        }(j);
      }
    }
  
  });