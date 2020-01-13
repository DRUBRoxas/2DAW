
function TresEnRaya(p1,p2)
{
    this.p1=p1;
    this.p2=p2;
    this.juego=[[],[],[]];
    this.turno=Math.round(Math.random());
    this.ganador="";
}

TresEnRaya.prototype.jugar=function(f,c)
{
    if(this.ganador=="" && this.juego[f][c]===undefined)
    {
        document.getElementById("p"+f+c).innerHTML=(this.turno==1)?"X":"O";
        this.juego[f][c]=this.turno;
        this.turno=(this.turno+1)%2;
        if(document.getElementById("p"+f+c)!==undefined)
        {
            this.victoria();
        }
    }
};
TresEnRaya.prototype.victoria=function(){
    //codigo victoria
    //return true/false
    var j=this.juego;
    if((j[0][0]+j[0][1]+j[0][2])%3==0 ||
       (j[1][0]+j[1][1]+j[1][2])%3==0 ||
       (j[2][0]+j[2][1]+j[2][2])%3==0 ||
       (j[0][0]+j[1][0]+j[2][0])%3==0 ||
       (j[0][1]+j[1][1]+j[2][1])%3==0 ||
       (j[0][2]+j[1][2]+j[2][2])%3==0 ||
       (j[0][0]+j[1][1]+j[2][2])%3==0 ||
       (j[2][0]+j[1][1]+j[0][2])%3==0)
    {
        if(this.turno===1)
        {
            this.ganador=this.p1;
        }
        else
        {
            this.ganador=this.p2;
        }
        alert("FELICIDADES "+this.ganador);
    }



};

var partida; //juego

function comenzar(){
    var form=document.forms["jugadores"]
    var j1=form["jug1"];
    var j2=form["jug2"];
    var i=0, j=0;
    var contabla="";

    partida=new TresEnRaya(j1.value,j2.value);
    if(partida.turno===0)
    {
        j1.style.border="1px solid green"
        j2.style.border="none"
    }else
    {
        j1.style.border="none"
        j2.style.border="1px solid green"
    }
    tbody=document.getElementById("juego");
    
    for (i=0;i<3;i++)
    {
        contabla+="<tr>"
        for (j=0;j<3;j++)
        {
            contabla+="<td id='p"+i+j+"' onclick='partida.jugar(" +i+ "," +j+ ")'>&nbsp;</td>"
        }
        contabla+="</tr>"
    }
    tbody.innerHTML=contabla;
}