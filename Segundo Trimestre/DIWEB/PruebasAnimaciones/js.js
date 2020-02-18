//Posiciones iniciales.
var imagenX = 300;
var imagenY = 50;
var imagen2X = 0;
var imagen2Y = 170;

//Imagenes.
var img = new Image;
img.src = "imagen.png";
var img2 = new Image;
img2.src = "imagen2.png";

function comenzar(){
    
     lienzo = document.getElementById('lienzo');
     lienzo.style.background='#666';
     ctx = lienzo.getContext('2d');

     //Llamar a la función cada 30 milisegundos.
     //Recordar que 1000 milisegundos = 1 segundo
     setInterval(mover, 30);
    

}

function mover(){

     //muevo la imagen hacia la izquierda restando 5.
     imagenX = imagenX - 5;
     //muevo la imagen hacia la derecha sumando 5.
     imagen2X = imagen2X + 5;
     
     if (imagenX == 0){
         imagenX = 300;
     }
     if (imagen2X >= 300){
         imagen2X = 0;
     }

     //Borro todo lo que haya en nuestro lienzo
     ctx.clearRect(0,0,lienzo.width,lienzo.height);
     
     //Dibujo las imágenes en la nueva posición
    ctx.drawImage(img, imagenX, imagenY);
    ctx.drawImage(img2, imagen2X, imagen2Y);
     
}


