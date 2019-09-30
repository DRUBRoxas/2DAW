<?php

class EjemplosMatrices
{
    //Matrices unidimensionales
    
    //Matriz de números
    public static $edades=[2,8,39,44];

    //Matriz de Cadenas
    public static $nombres=["Antonio","Juan","Manuel","Luis"];
    
    //Matriz asociativa
    public static $NombreEdad=["Antonio"=>2,"Juan"=>8,"Manuel"=>39,"Luis"=>45];

    //Matriz de objetos indexada
    public static function MatrizObjetoIndexada()
    {
        return $animales=[New Animal("Gato","felino"),new Animal("Raton","Roedor")];
    }
   
    //Matriz de Objetos asociativa
    public static function MatrizObjetosAsociativa()
    {
        return ["gato"=>new Animal("Gato","felino"),new Animal("Raton","Roedor")];
    }

    //Matriz asociativa/indexada liada
    public static $lio=[1=>20,5=>45,655=>12];


    //Matrices Multidimensionales
    //Matriz indexada
    public static $Comunidades=[["Jaén","Cordoba","Sevilla"],["Madrid"]];

    //Matriz asociativa
    public static $comunidadesasoc=["Andalucía" =>["Jaen","Cordoba"],"Madrid"=>["Madrid"]];


}

?>