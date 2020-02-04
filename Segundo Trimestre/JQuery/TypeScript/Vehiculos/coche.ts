import {Vehiculo} from "./Vehiculo";

class Coche extends Vehiculo{
    _baca: boolean;
    constructor(matricula,color,asientos,baca)
    {
        super(matricula,color,asientos);
        this._baca=baca;
    }

    protected get baca() : boolean {
        return this._baca;
    }
    
    protected set baca(v : boolean) {
        this._baca = v;
    }
}