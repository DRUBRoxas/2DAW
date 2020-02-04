export{Vehiculo};

abstract class Vehiculo{
    _matricula:string;
    _color:string;
    _asientos:number;
    constructor(matricula,color,asientos){
        this._matricula=matricula;
        this._color=color;
        this._asientos=asientos;
    }
    
    protected get matricula() : string {
        return this._matricula;
    }
    
    protected set matricula(v : string) {
        this._matricula = v;
    }

    protected get color() : string {
        return this._color;
    }
    
    protected set color(v : string) {
        this._color = v;
    }

    protected get asientos() : number {
        return this._asientos;
    }
    
    protected set asientos(v : number) {
        this._asientos = v;
    }

    
  
    
}