//Objeto coche

function Coche(l,a,posicion, col, ctx){
    this.largo = l;
    this.ancho=a;
    this.posicion=[posicion[0],posicion[1]];
    this.color = col;
    this.velocidad=0;
    this.temporizador = null;
    this.ctx = ctx;
}

Coche.prototype.pinta = function(){
    var x1 = this.posicion[0]-this.largo/2;
    var y1 = this.posicion[1]-this.ancho/2;
    this.ctx.clearRect(0,0,this.ctx.canvas.width,this.ctx.canvas.height);
    this.ctx.font="20px Arial";
    this.ctx.fillStyle = "black";
    this.ctx.fillText(this.velocidad,800,50);
    this.ctx.fillStyle = this.color;
    this.ctx.fillRect(x1,y1,this.largo,this.ancho);
}

Coche.prototype.mover = function(){
    this.posicion[0] = this.posicion[0]+this.velocidad/25;
    this.pinta();
}

Coche.prototype.arrancar = function(){
    this.temporizador = window.setInterval(function(coche){
        return function(){
            coche.mover();
        }
    }(this),40);
}

Coche.prototype.parar = function(){
    var coche= this;
    window.clearInterval(coche.temporizador);
    this.temporizador=null;
}

Coche.prototype.acelerar = function(){
    this.velocidad+=1;
}

Coche.prototype.frenar = function(){
    if(this.velocidad>0){
        this.velocidad-=1;
    }
}