<?php
class EjemplosMatrices
{
    //Matrices unidimensionales
    //Matriz de números indexada
    public static $edades=[2,8,39,45];
    //Matriz de cadenas indexada
    public static $nombres=["Antonio","Juan","Manuel","Luis"];
    //Matriz asociativa
    public static $nombreedad=["Antonio"=>2,"Juan"=>8,"Manuel"=>39,"Luis"=>45];
    //Matriz de objetos indexada
    public static function MatrizObjetoIndexada()
    {
        return $animales=[new Animal("gato","felino"),new Animal("ratón","roedor")];
    }
    //Matriz de objetos asociativa
    public static function MatrizObjetoAsociativa()
    {
        return ["gato"=>new Animal("gato","felino"),"ratón"=>new Animal("ratón","roedor")];
    }
    //Matriz asociativa/indexada liada
    public static $lio=[1=>20,5=>45,655=>12];

    //Matrices multidimensionales
    //Matriz indexada
    public static $comunidades=[["Jaén","Córdoba","Sevilla"],["Madrid"]];
    //Matriz asociativa
    public static $comunidadesasoc=["Andalucía"=>["Jaén","Córdoba"],"Madrid"=>["Madrid"]];

}