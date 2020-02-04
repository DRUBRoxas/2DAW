import {Vehiculo} from "./Vehiculo";

class Camion extends Vehiculo
{
    _carga:number;
    _peso:number;
    _numEjes:number;
    constructor(matricula,color,asientos,carga,peso,numEjes)
    {
        super(matricula,color,asientos);
        this._carga=carga;
        this._peso=peso;
        this._numEjes=numEjes;
    }

    protected get carga() : number{
        return this._carga;
    }
    
    protected set carga(v : number) {
        this._carga = v;
    }

    protected get peso() : number{
        return this._peso;
    }
    
    protected set peso(v : number) {
        this._peso = v;
    }
    
    
    protected get numEjes() : number{
        return this._numEjes;
    }
    
    protected set numEjes(v : number) {
        this._numEjes = v;
    }
}