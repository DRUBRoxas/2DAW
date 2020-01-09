//Libreria para trabajar con Selects

HTMLSelectElement.prototype.ordenar=function() 
{
     var v=[]
     var i;
     for(i=0;i<this.options.length;i++)
     {
         v[i]=this.options[i];
     }
     v.sort(function(a,b){return a.innerHTML.localeCompare(b.innerHTML)})
     for(i=0;i<this.options.length;i++)
     {
         this.appendChild(v[i]);
     }
}

HTMLSelectElement.prototype.pasarTA=function(sel){
    var i=0;

    var option;
    for(i=0;i<this.options.length;i++)
    {
        option=this.options[i];
        option.selected=false;   
        sel.appendChild(option);
    }
    sel.ordenar();
}

HTMLSelectElement.prototype.pasarA=function(sel){
    while(this.selectedIndex!=-1)
    {
        option=this.options[this.selectedIndex];
        option.selected=false;   
        sel.appendChild(option);
    }
    sel.ordenar();
}

