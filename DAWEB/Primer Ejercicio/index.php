<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <h1>TABLA DE MULTIPLICAR</h1>
</head>
<body>
<table border=1px>
    <?php

for ($p = 0; $p <= 10; $p++) {
    echo "<tr>Tabla del $p </tr>";
    for ($o = 0; $o <= 10; $o++) {
        echo "<td>$p * $o =" . $p * $o . "</td>";
    }
}

?>
</table>
</body>
</html>