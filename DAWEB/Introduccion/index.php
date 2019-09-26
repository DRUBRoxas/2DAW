<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Introducción rápida a la sintaxis y estructura de PHP</h1>
    <?php
        echo "Hola <strong>Pepe</strong>";
        $a = 20;
        echo "</br>";
        echo "El valor de la variable a es =" . $a . "</br>";
        echo "El valor de la variables a es = $a" . "<br>";
        echo 'El valor de la variable a es = $a' . "</br>";
        var_dump($a);
        var_dump($b);
        $a = "Esto es una cadena";
        echo "El valor de la variable a es $a";
        var_dump($a);
    ?>

<h1>Ámbito de las variables</h1>
<?php
    $x = 5;
    $y = 7;
    echo "La variable x = $x y la variable y = $y";
    suma();
    function suma()
    {
        global $x;
        //$x = 1;
        echo ("La variable x en la función vale $x");
    }

?>
<?php
echo "<h1>Bucles</h1></br>";
if ($x == 5) {
    echo "Valor bueno";
} else {
    echo "Malo";
}

?>
<?php if (true): ?>
<h1>Verdadero1</h1>
<h2>Verdadero2</h2>
<?php else: ?>
<h1>Falso1</h1>
<h2>Falso2</h2>
<?php endif ?>

<?php
    for ($i = 0; $i < 10; $i++) {
        echo "i= $i " . "</br>";
    }
    //Aunque los arrays los veremos con detalle creemos uno para utilizar el foreach
    $habitantes=["jaén"=>80000,"Córdoba"=>110000];
    foreach ($habitantes as $ciudad => $habitantes) {
        echo $ciudad."=".$habitantes."</br>";
    }
?>
<?php
    for ($i = 0; $i < 10; $i++) {
        echo "hola ". $i;

    }
?>

</body>
</html>