export{Animal};

class Animal{
    nombre:string;
    constructor(nombre){
        this.nombre=nombre;
    }

    muevete(velocidad=0){
        console.log(`${this.nombre} se está moviendo ${velocidad}`)
    }
}