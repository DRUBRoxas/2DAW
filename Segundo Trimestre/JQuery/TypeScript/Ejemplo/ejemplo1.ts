export{}

class Empleado {
    employeeName: string;
    
    constructor(name: string)
    {
        this.employeeName = name;
    }

    saluda(){
        console.log(`Good Morning ${this.employeeName}`);
    }

}

let empleado1 = new Empleado("Manuel");

empleado1.saluda();

class Manager extends Empleado{
    cargo:string;
    constructor(nombreJefe: string,cargo:string){
        super(nombreJefe);
        this.cargo=cargo;
    }
    delega(){
        console.log("haz esto")
    }
}

let m1 = new Manager("Antonio Illana","Jefe dpto");
m1.saluda();