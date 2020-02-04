import {Vehiculo} from "./Vehiculo";

class Furgoneta extends Vehiculo{
    _carga:number;
    _pesoMax:number;
    constructor(matricula,color,asientos,carga,pesoMax)
    {
        super(matricula,color,asientos);
        this._carga=carga;
        this._pesoMax=pesoMax;
    }

    protected get carga() : number{
        return this._carga;
    }
    
    protected set carga(v : number) {
        this._carga = v;
    }

    protected get pesoMax() : number{
        return this._pesoMax;
    }
    
    protected set pesoMax(v : number) {
        this._pesoMax = v;
    }
}