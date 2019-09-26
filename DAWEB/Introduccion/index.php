<!DOCTYPE html>
<html lang="es">
    <head>
        <title>titule</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <h1>Scripts en php</h1>

        <?php
echo "aló <strong>polisía</strong>";
$a = 20;
echo "<br/> el valor de la variable a es = " . $a;
echo "<br/> el valor de la variable a es = $a" . "<br/>";
var_dump($a);
var_dump($b);
$a = "esto es una cadena";
echo ("El valor de la variable a es " . $a . "<br/>");
var_dump($a);
?>
        <h1>Ámbito de las variables</h1>
        <?php
$x = 5;
$y = 7;
echo "la variable x=" . $x . " y la variable y=" . $y . "<br/>";
Suma();
function Suma()
{
    //global $x;
    //variable local
    $x = 1;
    echo "la variable x en la función vale $x";
}
echo "<h1>IF</h1>";
if ($x == 5) {
    echo "valor bueno";
} else {
    echo "valor malo";
}

?>
        <?php
if (true):

?>
        <h1>hola</h1>
        <h2>hola 2</h2>
        <?php
else:

    echo "No";

endif;
echo ("<h1>Bucles</h1>");
for ($i = 0; $i <= 9; $i++) {
    echo ("<p> Te he dicho hola " . $i . " veces</p>");
}
?>



    </body>
</html>